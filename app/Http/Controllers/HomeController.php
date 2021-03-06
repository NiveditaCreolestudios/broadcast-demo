<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;
use App\User;
Use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $otherParty = $userId==1?2:1;
        $messages = Message::whereIn('from_id',[$userId,$otherParty])->get();
        $users = User::get();
        return view('home', ['messages' => $messages, 'users'=>$users, 'authUser'=>Auth::user()->id]);
    }
}
