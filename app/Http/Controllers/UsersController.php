<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
