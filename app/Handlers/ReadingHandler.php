<?php

namespace App\Handlers;

use App\DataObjects\Create\CreateReadingData;
use App\DataObjects\Update\UpdateReadingData;
use App\Events\Create\CreatingReading;
use App\Events\Update\UpdatingReading;
use App\Services\ReadingService;
use Illuminate\Pagination\LengthAwarePaginator;

class ReadingHandler
{
    public static function get_readings(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return ReadingService::get_readings($data, $paginate);
    }

    public static function store_reading(object $request): void
    {
        $validated_request = CreateReadingData::from($request);

        event(new CreatingReading($validated_request));
    }

    public static function update_reading(object $reading, object $request): void
    {
        $validated_request = UpdateReadingData::from($request);
        event(new UpdatingReading($reading, $validated_request));
    }
}
