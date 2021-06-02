<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index', [
            'user' => User::orderBy('id', 'asc')->get(),
            'judul' => 'User'
        ]);
    }

    public function create()
    {
        //return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->id = $request->id_user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        return view('user.edit', [
            'data' => User::findOrFail(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Crypt::decrypt($id));
        $user->id = $request->id_user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('user.index');

    }
}
