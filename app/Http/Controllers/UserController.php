<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create(){
        $posts = Post::all();
        $departments = Department::all();
        $roles = Role::all();
        return view('user.create', compact('posts', 'departments', 'roles'));
    }


    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'post_id' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'],
            ]);

        $newImageName = time() . '-' . $data['name'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('images'), $newImageName);

        $password = $data['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data_departments = request()->validate([
            'department_id' => ''
        ]);

        $data_roles = request()->validate([
            'role_id' => ''
        ]);

        $new_user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'post_id' => $data['post_id'],
                'password' => $hashed_password,
                'image' => $newImageName
            ]
        );

        User::find($new_user->id)->departments()->attach($data_departments['department_id']);
        User::find($new_user->id)->roles()->attach($data_roles['role_id']);
       return redirect()->route('users.index');
    }

    public function show(User $user){

        return view('user.show', compact('user'));
    }

    public function edit(User $user){
        $posts = Post::all();
        $departments = Department::all();
        $roles = Role::all();
        return view('user.edit', compact('posts', 'user', 'departments', 'roles'));
    }

    public function update(Request $request, User $user){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'post_id' => ['required', 'integer'],
            'image' => ['mimes:jpg,png,jpeg', 'max:5048'],
        ]);
        
        if(array_key_exists('image', $data)){
            $newImageName= '';
            $newImageName = time() . '-' . $data['name'] . '.' . $data['image']->extension();
            $data['image']->move(public_path('images'), $newImageName);
            
            $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'post_id' => $data['post_id'],
            'image' => $newImageName,
        ]);
        }
        if(!(array_key_exists('image', $data))){
            $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'post_id' => $data['post_id'],
        ]);
        }
        

        $data_departments = $request->validate([
            'department_id' => ''
        ]);
        
        $data_roles = request()->validate([
            'role_id' => ''
        ]);

        User::find($user->id)->departments()->sync($data_departments['department_id']);
        User::find($user->id)->roles()->attach($data_roles['role_id']);

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }

}
