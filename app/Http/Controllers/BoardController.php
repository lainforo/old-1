<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Thread;

class BoardController extends Controller
{
    public function index()
    {
        // I'll definitely do more with this in the future :)
        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $threads = Thread::orderBy('id', 'desc')->where('featured', true)->get();
        return view('index', ['boards' => $boards, 'threads' => $threads]);
    }

    public function about()
    {
        // Probably going to move this somewhere else, too :)
        $boards = Board::orderBy('uri', 'asc')->where('indexed', 'true')->get();
        return view('about', ['boards' => $boards]);
    }

    public function getBoard($board_uri)
    {
        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $board = Board::where('uri', $board_uri)->first();
        $threads = Thread::where('board', $board_uri)->orderBy('id', 'desc')->get();
        return view('board.view', ['boards' => $boards, 'board' => $board, 'threads' => $threads]);
    }

    public function overboard()
    {
        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $threads = Thread::where('indexed', true)->orderBy('id', 'desc')->get();
        return view('board.overboard', ['boards' => $boards, 'threads' => $threads]);
    }
}
