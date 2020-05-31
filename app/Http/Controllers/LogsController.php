<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Log;

class LogsController extends Controller
{
    public function index()
    {
        $data =[];
        if(\Auth::check()){
            $user = \Auth::user();
            $logs = $user->feed_logs()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'logs' => $logs,
                ];
                
        }
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|max:20',
            'title' => 'required|max:20',
            'comment' => 'required|max:191',
            'myfile' => 'nullable|image',
        ]);
        
        if($request->file('myfile')){
        $image = $request->file('myfile');
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $url = Storage::disk('s3')->url($path);
        } else {
            $url = null;
        }
        
        $request->user()->logs()->create([
            'product_name' => $request->product_name,
            'title' => $request->title,
            'comment' => $request->comment,
            'myfile' => $url
            ]);
            
        return back();  
    }
    
    public function edit($id)
    {
        $log = Log::find($id);
        
        if(\Auth::id() == $log->user_id){
            return view('users.edit', [
                'log' => $log,
            ]);
        } else {
            return redirect('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required|max:20',
            'title' => 'required|max:20',
            'comment' => 'required|max:191',
            'myfile' => 'nullable|image',
        ]);
        
        $log = Log::find($id);
        
        if(\Auth::id() == $log->user_id){
            $log->product_name = $request->product_name;
            $log->title = $request->title;
            $log->comment = $request->comment;
            
            $url = Storage::disk('s3')->url($log->id);
            
            if($request->file('myfile')){
                Storage::delete($url);
                $image = $request->file('myfile');
                $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
                $url = Storage::disk('s3')->url($path);
                $log->myfile = $url;
            } else {
                $url = $log->myfile;
            }
            
            $log->save();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    
    public function destroy($id)
    {
        $log = Log::find($id);
        
        if(\Auth::id() === $log->user_id) {
            $log->delete();
        }
        
        return back();
    }
}
