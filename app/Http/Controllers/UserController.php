<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Board;

class UserController extends Controller
{
    public function userAuth(Request $request)
    {
        // Authenticate a user by using their information from a login form.
        // See the form.userlogin view.

        if (hash('sha256', $request->password) == User::where('username', $request->username)->pluck('password')->first()) {
            $boards = Board::orderBy('slug', 'asc')->where('indexed', true)->get();
            $response = new Response(redirect(route('userPanel', ['boards' => $boards])));
            $response->withCookie(cookie('user_login', $request->username, 43200));
            return $response;
        } else {
            return view('error', ['error' => "Incorrect login. Please try again."]);
        }
    }

    public function userPanel()
    {
        // Build the user.panel template

        $boards = Board::orderBy('slug', 'asc')->where('indexed', true)->get();
        return view('user.panel', ['boards' => $boards]);
    }
}
