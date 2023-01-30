<?php

namespace App\Actions\Reading;

class CreateReadingAction
{
    // public function __construct(public object $bible_session, public object $request)
    // {
    //     // dd($request);
    //     $this->bible_session = $bible_session;
    //     $this->request = $request;
    // }

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
