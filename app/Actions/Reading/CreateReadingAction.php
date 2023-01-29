<?php

namespace App\Actions\Reading;

class CreateReadingAction
{
    public static function handle(object $bible_session, object $request): void
    {
        $bible_session->reading()->create([
            'verse' => $request->read,
            'notes' => $request->notes,
            'prayer_points' => $request->prayer_points,
            // 'prayer' => $request->prayer,
        ]);
    }
}
