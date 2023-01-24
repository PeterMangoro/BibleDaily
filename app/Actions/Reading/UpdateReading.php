<?php

namespace App\Actions\Reading;

class UpdateReading
{
    public static function handle(object $reading, object $request)
    {
        $reading->read = $request->read;
        $reading->notes = $request->notes;
        $reading->prayer_points = $request->prayer_points;
        $reading->prayer = $request->prayer;
        $reading->save();
    }
}
