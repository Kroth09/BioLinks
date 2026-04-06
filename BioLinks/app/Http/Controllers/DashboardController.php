<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke(){

        /** @var User $user  */
        $user = auth()->user();

        dump(
            $user->links(),
            $user->with('links')
            ->where('name', '=', 'titulo')
            ->get()
        );

        return view('dashboard');
    }
}
