<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfilleController extends Controller
{

    public function index()
    {
        return view('profille',[
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->fill($request->validated())->save();

        return back()->with('message', 'Profile atualizado com sucesso!');

    }

}
