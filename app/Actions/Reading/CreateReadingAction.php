<?php

namespace App\Actions\Reading;

class CreateReadingAction
{
    public function __construct(public object $bible_session, public object $request)
    {
        // dd($request);
        $this->bible_session = $bible_session;
        $this->request = $request;
    }

    public function handle(): void
    {
        $this->bible_session->reading()->create([
            'verse' => $this->request->read,
            'notes' => $this->request->notes,
            'prayer_points' => $this->request->prayer_points,
            // 'prayer' => $request->prayer,
        ]);
    }
}
