<?php

namespace App\Actions\Reading;

class UpdateReadingAction
{
    public static function handle(object $reading, object $request):void
    {
        $reading->read = $request->read;
        $reading->notes = $request->notes;
        $reading->prayer_points = $request->prayer_points;
        $reading->prayer = $request->prayer;
        $reading->save();
    }
}
