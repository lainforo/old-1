<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Reply;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function xkcd()
    {
        // generates a random xkcd comic

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
        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $board = Board::where('uri', $board_uri)->first();
        $thread = Thread::where('id', $thread_id)->first();
        $replies = Reply::where('replyto', $thread_id)->get();

        return view('thread.view', ['boards' => $boards, 'board' => $board, 'thread' => $thread, 'replies' => $replies]);
    }

    public function putThread(Request $request)
    {
        $thread = new Thread;

        $thread->board = $request->board;
        $thread->author = $request->author;
        $thread->subject = $request->subject;
        $thread->body = $request->body;
        $thread->indexed = $request->indexed;

        $thread->save();

        return redirect()->back();
    }

    public function putReply(Request $request)
    {
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
        $reply->save();
        
        $thread = Thread::where('id', $request->replyto)->first();
        $thread->updated_at = time();
        $thread->save();

        return redirect()->back();
    }

    public function delReply(Request $request)
    {
        Reply::where('id', $request->replyid)->delete();

        return redirect()->back();
    }

    public function delThread(Request $request)
    {
        Thread::where('id', $request->threadid)->delete();
        Reply::where('replyto', $request->threadid)->delete();
        return redirect(route('index'));
    }

    public function featureThread(Request $request)
    {
        $thread = Thread::where('id', $request->threadid)->first();
        $thread->featured = true;
        $thread->save();
        return redirect()->back();
    }

    public function unFeatureThread(Request $request)
    {
        $thread = Thread::where('id', $request->threadid)->first();
        $thread->featured = false;
        $thread->save();
        return redirect()->back();
    }
}
