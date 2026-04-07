<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;

class LinkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {

        /** @var User $user */
        $user = auth()->user();

        $lastSort = $user->links()->max('sort') ?? 0;

        $user->links()
            ->create([ ...$request->validated(), 'sort' => $lastSort + 1]);

        return to_route('dashboard');
    }



    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->link = $request->link;
        $link->name = $request->name;
        $link->save();

        return to_route('dashboard')
            ->with('message','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return to_route('dashboard', 'Deletado com sucesso!');
    }

    public function up(Link $link){
        $order = $link->sort;
        $newOrder = $order - 1;

        /** @var User $user */
        $user = auth()->user();

        $swapWith = $user->links()
            ->where('sort', '=', $newOrder)
            ->first();

        if (!$swapWith) {
            return back();
        }

        $link->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();

        return back();

    }

    public function down(Link $link){

        $order = $link->sort;
        $newOrder = $order + 1;

        /** @var User $user */
        $user = auth()->user();

        $swapWith = $user->links()
            ->where('sort', '=', $newOrder)
            ->first();

        if (!$swapWith) {
            return back();
        }

        $link->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();

        return back();
    }

}
