<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $validatedData = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email:rfc,dns|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|max:255',
            'password_confirmation' => 'nullable|same:password',
        ]);

        if (request()->password) {
            $validatedData['password'] = Hash::make(request()->password);

            $user->update($validatedData);
        } else {
            $user->update([
                'name' => request()->name,
                'email' => request()->email
            ]);
        }

        return back()->with('message', 'User updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'User deleted!');
    }
}
