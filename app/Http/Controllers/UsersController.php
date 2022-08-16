<?php

namespace App\Http\Controllers;

use App\BambooInstance;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(Request $request) {
        auth()->user()->authorizeRoles(['admin']);
        $users = User::with('roles', 'instances');
        if ($request->get('search')) {
            $users->where('name', 'LIKE', '%' . $request->get('search') . '%');
            $users->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }
        $users = $users->paginate(20);
        return view('users-list', ['users' => $users]);
    }

    public function show($id) {
        auth()->user()->authorizeRoles(['admin']);
        $user = null;
        $roles = Role::all();
        $instances = BambooInstance::all();

        if ($id == 0) {
            return view('users-detail', [
                'user' => $user,
                'roles' => $roles,
                'instances' => $instances,
                'user_json' => json_encode($user),
                'roles_json' => json_encode($roles),
                'instances_json' => json_encode($instances),
                'action' => 'create',
            ]);
        }

        $user = User::with('roles', 'instances')->find($id);

        return view('users-detail', [
            'user' => $user,
            'roles' => $roles,
            'instances' => $instances,
            'user_json' => json_encode($user),
            'roles_json' => json_encode($roles),
            'instances_json' => json_encode($instances),
            'action' => 'update',
        ]);
    }

    public function store(Request $request) {
        auth()->user()->authorizeRoles(['admin']);

        $data = $request->all();

        $data['password'] = \Hash::make($request->get('password'));

        $newUser = User::create($data);

        $newUser->instances()->sync($data['instance_ids']);
        $newUser->roles()->sync($data['role_ids']);

        return redirect('users');
    }

    public function update($id, Request $request) {
        auth()->user()->authorizeRoles(['admin']);

        $data = $request->all();

        unset($data['password']);

        $user = User::find($id);
        $user->update($data);

        if ($request->get('password')) {
            $user->update([
                'password' => \Hash::make($request->get('password'))
            ]);
        }

        $user->instances()->sync($data['instance_ids']);
        $user->roles()->sync($data['role_ids']);

        return redirect('users');
    }

    public function delete() {
        auth()->user()->authorizeRoles(['admin']);
        return redirect('users');
    }
}
