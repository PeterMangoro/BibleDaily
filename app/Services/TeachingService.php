<?php

namespace App\Services;

use App\Actions\Teaching\CreateTeachingAction;
use App\Actions\Teaching\GetTeachingsAction;
use App\Actions\Teaching\UpdateTeachingAction;
use Illuminate\Pagination\LengthAwarePaginator;

class TeachingService
{
    public static function getTeachings(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return GetTeachingsAction::handle($data, $paginate);
    }

    public static function getTeaching(object $data): object
    {
        return GetTeachingsAction::handleOne($data);
    }

    public static function newTeaching(object $bible_session, object $request): void
    {
        CreateTeachingAction::handle($bible_session, $request);
    }

    public static function updateTeaching(object $teaching, object $request): void
    {
        UpdateTeachingAction::handle($teaching, $request);
    }
}
