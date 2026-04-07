<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moveUp(){
        $this->move(-1);
    }

    public function moveDown(){
        $this->move(+1);
    }

    private function move($to){
    // +1 ou -1

        $order = $this->sort;
        $newOrder = $order + $to;

        /** @var User $user */
        $user = $this->user;

        $swapWith = $user->links()
            ->where('sort', '=', $newOrder)
            ->first();

        if (!$swapWith) {
            return back();
        }

        $this->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();


    }


}
