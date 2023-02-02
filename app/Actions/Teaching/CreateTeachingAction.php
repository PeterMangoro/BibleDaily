<?php

namespace App\Actions\Teaching;

class CreateTeachingAction
{
    public static function handle(
        object $bible_session,
        object $request
    ): void {
        $bible_session->teaching()->create([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
        ]);
    }
}
