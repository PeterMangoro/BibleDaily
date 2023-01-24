<?php

namespace App\Actions\Teaching;

use Illuminate\Support\Str;

class CreateTeaching
{
    public static function handle(object $bible_session, object $request)
    {
        $bible_session->create([
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
        ]);
    }
}
