<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $notes = Note::orderBy('created_at','desc')->paginate(10);
        return view('notes.index')->with('notes',$user->notes);
    }
    public function admin()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $notes = Note::orderBy('created_at','desc')->paginate(10);
        return view('admin.user')->with('notes',$user->notes);
    }
}
