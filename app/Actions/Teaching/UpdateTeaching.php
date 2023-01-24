<?php

namespace App\Actions\Teaching;

use Illuminate\Support\Str;

class UpdateTeaching
{
    public static function handle(object $teaching, object $request)
    {
        $teaching->title = $request->title;
        $teaching->slug = Str::of($request->title)->slug('-');
        $teaching->save();
    }
}
