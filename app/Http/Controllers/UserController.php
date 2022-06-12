<?php

namespace App\Http\Controllers;

use App\Models\Otdel;
use App\Models\Post;
use App\Models\UserOtdel;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use function GuzzleHttp\Promise\all;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        //$users = User::all();
        $users = User::all();

        $date = Carbon::parse('')->locale('ru');
        $date->isoFormat('DD.MM.YYYY');

        return view('user.index', compact('users'));
    }

    public function create(){
        $posts = Post::all();
        $otdels = Otdel::all();
        return view('user.create', compact('posts', 'otdels'));
    }


    public function store(){


        $data = request()->validate([
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

        $data_otdels = request()->validate([
            'otdel_id' => ''
        ]);

        $new_user = User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'post_id' => $data['post_id'],
            'password' => $hashed_password,
            'image' => $newImageName,
            ]
        );

        User::find($new_user->id)->otdels()->attach($data_otdels['otdel_id']);
       return redirect()->route('user.index');
    }

    public function show(User $user){

        return view('user.show', compact('user'));
    }

    public function edit(User $user){
        $posts = Post::all();
        $otdels = Otdel::all();
        return view('user.edit', compact('posts', 'user', 'otdels'));
    }

    public function update(User $user){
        $data = request()->validate([
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
        

        $data_otdels = request()->validate([
            'otdel_id' => ''
        ]);
        
        
        User::find($user->id)->otdels()->sync($data_otdels['otdel_id']);

        return redirect()->route('user.show', $user->id);
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index');
    }

}
