<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\succursale;
use App\Model\produits;
use App\Model\approvisionnement;
use DB;
session_start();

class ApprovisionnementController extends Controller
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
    public function approvi()
    {

      // session_unset();
        $succursales = succursale::where("id",'>',1)->get();
        $produits = produits::all();
        return view('pages/principale/approvision/approvi')->withSuccursales($succursales)->withProduits($produits);

    }

}