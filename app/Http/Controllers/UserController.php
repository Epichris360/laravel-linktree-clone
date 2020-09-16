<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    //

    public function edit() {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request) {
        // want full hex, no empty answers
        $request->validate([
            'background_color'=> 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#'
        ]);

        Auth::user()->update($request->only([
            'background_color',
            'text_color'
        ]));

        return redirect()->back()->with([ 'success' => 'Changes saved successfully' ]);
    }

    public function show(User $user) {
        $user->load('links'); // lazy loads links to user object before rendering the view
        return view('users.show', [
            'user' => $user
        ]);
    }
}
