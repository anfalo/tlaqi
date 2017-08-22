<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

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
    public function index()
    {
        $files = File::where('user_id', Auth::id())->get();
        return view('home')->with('files', $files);
    }
}
