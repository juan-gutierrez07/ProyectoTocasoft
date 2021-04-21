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
        return view('principal/template');
    }

    public function down()
    {
        $now = new \DateTime();
        $file="backup"."-". $now->format("Y-m-d").".sql";
        return response()->download(storage_path('app\backup\.'. $file));
    }
}
