<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\User;

use Illuminate\Support\Facades\Auth;
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
    public function index(Request $request)
    {
        if($request->user()->hasRole('admin')) {
            $users = User::all();
            $files = File::all();
            return view('admin')->with(['files' => $files, 'users' => $users]);
        } else {
            $files = File::where('user_id', Auth::id())->get();
            return view('home')->with('files', $files);
        }
    }
}
