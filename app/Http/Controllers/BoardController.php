<?php
/*  BoardController
    @author LostBox66

    This is for basic & advanced operations on boards,
    including the site index and the functions to render specific boards.

*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Thread;
use App\Models\Reply;

class BoardController extends Controller
{
    public function index()
    {
        // Builds the index page (home) template

        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();

        if (Thread::orderBy('id', 'desc')->where('featured', true)->count() >= 1) {
            $threads = Thread::orderBy('id', 'desc')->where('featured', true)->get();
        } else {
            $threads = null;
        }

        $posts = Thread::where('indexed', true)->count() + Reply::where('indexed', true)->count();
        $boardcount = Board::where('indexed', true)->count();
        return view('index', [
            'boards' => $boards,
            'threads' => $threads,
            'posts' => $posts,
            'boardcount' => $boardcount
        ]);
    }

    public function about()
    {
        // Builds the about page template.
        // Will probably move this somewhere, or remove it entirely.
        $boards = Board::orderBy('uri', 'asc')->where('indexed', 'true')->get();
        return view('about', ['boards' => $boards]);
    }

    public function getBoard($board_uri)
    {
        // Get a specific board by slug (e.g. /a/)

        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $board = Board::where('uri', $board_uri)->first();
        $threads = Thread::where('board', $board_uri)->orderBy('id', 'desc')->get();
        return view('board.view', ['boards' => $boards, 'board' => $board, 'threads' => $threads]);
    }

    public function overboard()
    {
        // List every public thread on the site, and sort by latest reply (updated_at).

        $boards = Board::orderBy('uri', 'asc')->where('indexed', true)->get();
        $threads = Thread::where('indexed', true)->orderBy('updated_at', 'desc')->get();
        return view('board.overboard', ['boards' => $boards, 'threads' => $threads]);
    }
}
