<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index()
    {
        $data =[];
        if(\Auth::check()){
            $user = \Auth::user();
            $logs = $user->logs()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'logs' => $logs,
                ];
        }
        
        return View('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            '商品名' => 'required|max:20',
            'タイトル' => 'required|max:20',
            'コメント' => 'required|max:191',
        ]);
        
        $request->user()->logs()->create([
            '商品名' => $request->product_name,
            'タイトル' => $request->title,
            'コメント' => $request->comment,
            ]);
            
        return back();    
    }
    
    public function destroy($id)
    {
        $log = \App\log::find($id);
        
        if(\Auth::id() === $log->user_id) {
            $log->delete();
        }
        
        return back();
    }
}
