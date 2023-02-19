<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Reply;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function getThread($board_uri, $thread_id)
    {
        $boards = Board::orderBy('uri', 'asc')->get();
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

        $thread->save();

        return redirect()->back();
    }

    public function putReply(Request $request)
    {
        $reply = new Reply;

        $reply->replyto = $request->replyto;
        $reply->author = $request->author;
        $reply->body = $request->body;

        $reply->save();

        return redirect()->back();
    }
}