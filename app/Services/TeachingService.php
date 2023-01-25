<?php

namespace App\Services;

use App\Actions\Teaching\GetTeachings;
use App\Actions\Teaching\CreateTeaching;
use App\Actions\Teaching\UpdateTeaching;
use Illuminate\Pagination\LengthAwarePaginator;

class TeachingService
{
    public static function get_teachings(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return GetTeachings::handle($data, $paginate);
    }

    public static function get_teaching(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return GetTeachings::handle_one($data, $paginate);
    }

    public static function new_teaching(object $bible_session, object $request): void
    {
        CreateTeaching::handle($bible_session, $request);
    }

    public static function update_teaching(object $teaching, object $request): void
    {
        UpdateTeaching::handle($teaching, $request);
    }
}
