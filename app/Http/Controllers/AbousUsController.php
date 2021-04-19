<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\AbousUs;
use App\Modelos\Modul;
class AbousUsController extends Controller
{
    public function store(Request $request,Modul $modul)
    {
        dd($request);
    }
    public function update(Request $request)
    {

    }
    public function destroy(AbousUs $abousus)
    {

    }
}
