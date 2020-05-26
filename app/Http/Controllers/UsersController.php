<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $logs = $user->logs()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'logs' => $logs,
            ];
            
        $data += $this->counts($user);
        
        return view('users.show', $data);
        return view('users.show', [
            'user' => $user,
            ]);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        //$logs = $user->logs()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
            //'logs' => $logs
            ];
            
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
            ];
            
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
}
