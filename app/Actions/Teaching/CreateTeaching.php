<?php

namespace App\Actions\Teaching;

class CreateTeaching
{
    public static function handle(object $bible_session, object $request):void
    {
        $bible_session->create([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
        ]);
    }
}
