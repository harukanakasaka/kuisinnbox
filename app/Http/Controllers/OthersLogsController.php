<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;

class OthersLogsController extends Controller
{
    public function index()
    {
        if(\Auth::check()){
            $logs = Log::orderBy('id', 'desc')->paginate(10);
    
            return view('all_welcome', [
                'logs' => $logs
            ]);
        }
    }    
}
