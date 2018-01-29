<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        //add session
        session(['rangga'=>'jagoan']);
        // $request->session()->put(['rangga'=>'jagoan']);

        //delete session
        // $request->session()->forget(['rangga']);

        //menghapus sesion only
        $request->session()->flush();
        return $request->session()->all();

        //flash hanya sekali pakai data
        $request->session()->flash('message','message');
        $request->session()->reslash();
        $request->session()->keep('message');

        return view('home');
    }
}
