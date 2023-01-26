<?php

namespace App\Services;

use App\Actions\Reading\CreateReadingAction;
use App\Actions\Reading\GetReadingsAction;
use App\Actions\Reading\UpdateReadingAction;
use Illuminate\Pagination\LengthAwarePaginator;

class ReadingService 
{
    public static function get_readings(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return GetReadingsAction::handle($data, $paginate);
    }

    public static function new_reading(object $bible_session, object $request): void
    {
        CreateReadingAction::handle($bible_session, $request);
    }

    public static function update_reading(object $reading, object $request): void
    {
        UpdateReadingAction::handle($reading, $request);
    }
}
