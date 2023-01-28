<?php

namespace App\Actions\Reading;

use App\DataObjects\Create\CreateReadingData;

class CreateReadingAction
{
    public static function handle(object $bible_session, object $request): void
    {
        $bible_session->reading()->create([
            'read' => $request->read,
            'notes' => $request->notes,
            'prayer_points' => $request->prayer_points,
            // 'prayer' => $request->prayer,
        ]);
    }
}
