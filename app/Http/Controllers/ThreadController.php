<?php
/*  ThreadController
    @author LostBox66

    For operations regarding threads,
    put, del, change, etc.

*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Reply;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function sendNtfy($text, $author, $ntfytype, $threadtitle)
    {
        // Send notifications using ntfy.sh
        // This is set up to use the environment variable NTFY_TOPIC

        if ($ntfytype == 'reply') {
            $data = $author . ' replied: "' . $text . '" in ' . $threadtitle;
        } elseif ($ntfytype == 'thread') {
            $data = $author . ' created a new thread: "' . $text . '"';
        }

        $ntfysh = 'http://ntfy.sh/' . env('NTFY_TOPIC');

        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
        ])->post($ntfysh, $data);

        return $response;
    }

    public function xkcd()
    {
        // generates a random xkcd comic
        // see more at xkcd.com

        // Generate a random number between 1 and the latest comic number
        $latest_comic_number = 2739;
        $random_comic_number = rand(1, $latest_comic_number);

        // Construct the URL for the random comic
        $random_comic_url = "https://xkcd.com/{$random_comic_number}/info.0.json";
        $response = file_get_contents($random_comic_url);
        $json = json_decode($response);
        $image_url = $json->img;

        // Display the comic image
        return "{$image_url}";
    }

    public function getThread($board_uri, $thread_id)
    {
        // Get a specific thread by ID.

        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $board = Board::where('uri', $board_uri)->first();
        $thread = Thread::where('id', $thread_id)->first();
        $replies = Reply::where('replyto', $thread_id)->get();

        return view('thread.view', ['boards' => $boards, 'board' => $board, 'thread' => $thread, 'replies' => $replies]);
    }

    public function putThread(Request $request)
    {
        // Create a thread

        $thread = new Thread;

        $thread->board = $request->board;
        $thread->author = $request->author;
        $thread->subject = $request->subject;
        $thread->body = $request->body;
        $thread->indexed = $request->indexed;
        if ($request->tripcode ?? '') {
            $thread->tripcode = hash('sha256', $request->tripcode);
        } else {
            $thread->tripcode = null;
        }

        $this->sendNtfy($request->body, $request->author, 'thread', $thread->subject);
        $thread->save();

        return redirect()->back();
    }

    public function putReply(Request $request)
    {
        // Create a reply

        $reply = new Reply;

        $reply->replyto = $request->replyto;
        $reply->author = $request->author;
        $reply->body = $request->body;
        $reply->indexed = $request->indexed;
        if ($request->rolldie == 'true') {
            // user selected to roll die
            $reply->die = random_int(1, 6);
        }
        if ($request->xkcd == 'true') {
            $reply->xkcd = $this->xkcd();
        }
        if ($request->tripcode ?? '') {
            $reply->tripcode = hash('sha256', $request->tripcode);
        } else {
            $reply->tripcode = null;
        }
        $reply->save();

        
        $thread = Thread::where('id', $request->replyto)->first();
        $this->sendNtfy($request->body, $request->author, 'reply', $thread->subject);
        $thread->updated_at = time();
        $thread->save();

        return redirect()->back();
    }

    public function delReply(Request $request)
    {
        // Delete a reply by ID

        Reply::where('id', $request->replyid)->delete();

        return redirect()->back();
    }

    public function delThread(Request $request)
    {
        // Deletes a thread and all associated replies by ID

        Thread::where('id', $request->threadid)->delete();
        Reply::where('replyto', $request->threadid)->delete();
        return redirect(route('index'));
    }

    public function featureThread(Request $request)
    {
        // Feature a thread by ID

        $thread = Thread::where('id', $request->threadid)->first();
        $thread->featured = true;
        $thread->save();
        return redirect()->back();
    }

    public function unFeatureThread(Request $request)
    {
        // Unfeature a thread by ID

        $thread = Thread::where('id', $request->threadid)->first();
        $thread->featured = false;
        $thread->save();
        return redirect()->back();
    }
}
