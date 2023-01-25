<?php

namespace App\Handlers;

use App\Services\ReadingService;
use App\Events\Create\CreatingReading;
use App\Events\Update\UpdatingReading;
use App\DataObjects\Create\CreateReadingData;
use App\DataObjects\Update\UpdateReadingData;

class ReadingHandler
{
    public static function get_readings(object $data, ?int $paginate = 9)
    {
        return ReadingService::get_readings($data, $paginate);
    }

    public static function store_reading(object $request)
    {
        $validated_request = CreateReadingData::from($request);

        event(new CreatingReading($validated_request));
    }

    public static function update_reading(object $reading, object $request)
    {        
        $validated_request = UpdateReadingData::from($request);
        event(new UpdatingReading($reading, $validated_request));
    }
}
