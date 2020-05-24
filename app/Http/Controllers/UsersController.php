<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
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
}
