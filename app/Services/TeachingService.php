<?php

namespace App\Services;

use App\Actions\Teaching\GetTeachingsAction;
use App\Actions\Teaching\CreateTeachingAction;
use App\Actions\Teaching\UpdateTeachingAction;
use Illuminate\Pagination\LengthAwarePaginator;

class TeachingService
{
    public static function get_teachings(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return GetTeachingsAction::handle($data, $paginate);
    }

    // public static function get_teaching(object $data): object
    // {
    //     return GetTeachingsAction::handle_one($data);
    // }

    public static function new_teaching(object $bible_session, object $request): void
    {
        CreateTeachingAction::handle($bible_session, $request);
    }

    public static function update_teaching(object $teaching, object $request): void
    {
        UpdateTeachingAction::handle($teaching, $request);
    }
}
