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

        $data = $request->validated();

        if ( $file = $request->photo ) {
            $data['photo'] = $file->store('photos');
        }


        $user->fill($data)->save();

        return back()->with('message', 'Profile atualizado com sucesso!');

    }

}
