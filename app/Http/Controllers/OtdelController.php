<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Otdel;

class OtdelController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $otdels = Otdel::all();

        return view('otdel.index', compact('otdels'));
    }

    public function create(){
        return view('otdel.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'string',
        ]);
        Otdel::create($data);
        return redirect()->route('otdel.index');
    }

    public function show(Otdel $otdel){
        return view('otdel.show', compact('otdel'));
    }

    public function edit(Otdel $otdel){
        return view('otdel.edit', compact('otdel'));
    }

    public function update(Otdel $otdel){
        $data = request()->validate([
            'name' => 'string'
        ]);
        $otdel->update($data);
        return redirect()->route('otdel.show', $otdel->id);
    }

    public function destroy(Otdel $otdel) {
        $otdel->delete();
        return redirect()->route('otdel.index');
    }
}
