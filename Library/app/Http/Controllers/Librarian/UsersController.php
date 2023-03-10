<?php

namespace App\Http\Controllers\Librarian;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersFormRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('librarian.users.index',compact('users'));
    }

    public function create()
    {
        return view('librarian.users.create');
    }

    public function store(UsersFormRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User;
        $user->name               = $validatedData['name'];
        $user->surname            = $validatedData['surname'];
        $user->email              = $validatedData['email'];
        $user->role_as            = $validatedData['role_as'];
        $user->password           = Hash::make($validatedData['password']);
        $user->save();

        return redirect('librarian/users/')->with('message', 'User created successufully');
    }
 
    public function edit(User $user)
    {
        return view('librarian.users.edit', compact('user'));
    }

    public function update(UsersFormRequest $request, User $user)
    {
        $validatedData = $request->validated();

        User::where('id', $user->id)->update([
            'name'          => $validatedData['name'],
            'surname'       => $validatedData['surname'],
            'email'         => $validatedData['email'],
            'role_as'       => $validatedData['role_as'],
            'password'      => Hash::make($validatedData['password']),
        ]);

        return redirect('librarian/users')->with('message', 'User updated successufully');
    }

    public function destroy(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->delete();
        return redirect()->back()->with('message', 'USer deleted');
    }
}
