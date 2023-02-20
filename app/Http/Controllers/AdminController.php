<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Board;

class AdminController extends Controller
{
    public function checkLogin(Request $request)
    {
        if ($request->password == env('LF_PASSWORD')) {
            $boards = Board::orderBy('slug', 'asc')->get();
            $response = new Response(view('admin.panel', compact('boards')));
            $response->withCookie(cookie('admin_login', $request->password, 1440));
            return $response;
        } else {
            return view('error', ['error' => "Incorrect login. Please try again."]);
        }
    }

    public function adminPanel()
    {
        $boards = Board::orderBy('slug', 'asc')->get();
        return view('admin.panel', compact('boards'));
    }
}
