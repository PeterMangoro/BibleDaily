<?php

namespace App\Services;

use App\Actions\Reading\CreateReadingAction;
use App\Actions\Reading\GetReadingsAction;
use App\Actions\Reading\UpdateReadingAction;
use Illuminate\Pagination\LengthAwarePaginator;

class ReadingService
{
    public static function getReadings(
        object $data,
        ?int $paginate = 9
    ): LengthAwarePaginator {
        return GetReadingsAction::handle($data, $paginate);
    }

    public static function newReading(
        object $bible_session,
        object $request
    ): void {
        CreateReadingAction::handle($bible_session, $request);
        // (new CreateReadingAction($bible_session, $request))->handle();
    }

    public static function updateReading(
        object $reading,
        object $request
    ): void {
        UpdateReadingAction::handle($reading, $request);
    }
}
