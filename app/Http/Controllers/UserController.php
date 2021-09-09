<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(15);
        return view('dashboard.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'mobile' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'fname' => 'required',
            'lname' => 'required',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('dashboard/images/users'), $image);
        $image = '/dashboard/images/users/' . $image;

        $input = $request->except(['password_confirmation', 'roles']);
        $input['password'] = Hash::make($input['password']);
        $input['image'] = $image;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('dashboard.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'fname' => 'required',
            'lname' => 'required',
        ]);
        $input = $request->except(['password_confirmation', 'roles']);
        if ($request->has('image')) {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg',
            ]);
            File::delete(public_path($user->image));
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('dashboard/images/users'), $image);
            $input['image'] = '/dashboard/images/users/' . $image;
        }else {
            $input['image'] = $user->image;
        }
        if (!$request->has('password')) {
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *    
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        File::delete(public_path($user->image));
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
