<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landing extends Controller
{


	//Pour le form de  test 
    public function meneyatest()
    {
        return view('meneyatest');
    }

	//Pour le form d'abonnement  

    public function meneyaabonner()
    {
        return view('meneyaabonner');
    }

	//Pour le form d'achat  

    public function meneyaacheter()
    {
        return view('meneyaacheter');
    }
	//Pour le form d'achat  

    public function formTest(Request $request)
    {
        return redirect('/login');
    }

}
