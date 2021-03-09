<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(getRole() == "admin")
        {
         return view('layouts.app');
        }
        else
        {
         return redirect('/appSuc');
        }
    }

    public function smspromo(Request $request)
    {
        /*return view('pages.principale.marketing.p_campNew')
                ->with('sender',$sender);*/
        return view('layouts.smspromo')
                ->with('info',$request->alert);
    }
}
