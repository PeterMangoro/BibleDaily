<?php

namespace App\Actions\Teaching;

use Illuminate\Support\Str;

class UpdateTeachingAction
{
    public static function handle(object $teaching, object $request): void
    {
        $teaching->title = $request->title;
        $teaching->slug = Str::of($request->title)->slug('-');
        $teaching->save();
    }
}
