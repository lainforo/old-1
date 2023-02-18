<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function index()
    {
        // I'll definitely do more with this in the future :)
        $boards = Board::orderBy('uri', 'asc')->get();
        return view('index', ['boards' => $boards]);
    }

    public function about()
    {
        // Probably going to move this somewhere else, too :)
        return view('about');
    }

    public function getBoard($board_uri)
    {
        $boards = Board::orderBy('uri', 'asc')->get();
        $board = Board::where('uri', $board_uri)->first();
        return view('board.view', ['boards' => $boards, 'board' => $board]);
    }
}
