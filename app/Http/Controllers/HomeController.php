<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $filename = "backup-" . sha1(Carbon::now()->format('Y-m-d')) . ".sql";

        $command = "" . env('DUMP_PATH') . " --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD')
            . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . $filename;

        $returnVar = NULL;
        $output = NULL;

        exec($command, $output, $returnVar);
        $antes = \Response::download($filename);

        
        return $antes;
       // header("Location: $filename"); // Redireccionamos para descargar el Arcivo ZIP

        //dd();
        //return redirect('/');
        // $now = new \DateTime();
        // $file="backup"."-". $now->format("Y-m-d").".sql";
        // return response()->download(storage_path('app\backup\.'. $file));
    }
}
