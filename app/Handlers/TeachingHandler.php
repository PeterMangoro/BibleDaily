<?php

namespace App\Handlers;

use App\Actions\Teaching\DeleteTeachingAction;
use App\DataObjects\Create\CreateTeachingData;
use App\DataObjects\Update\UpdateTeachingData;
use App\Events\Create\CreatingTeaching;
use App\Events\Update\UpdatingTeaching;
use App\Services\TeachingService;
use Illuminate\Pagination\LengthAwarePaginator;

class TeachingHandler
{
    public static function getTeachings(
        object $data,
        ?int $paginate = 9
    ): LengthAwarePaginator {
        return TeachingService::getTeachings($data, $paginate);
    }

    public static function storeTeaching(object $request): void
    {
        $validated_request = CreateTeachingData::from($request);
        event(new CreatingTeaching($validated_request));
    }

    public static function updateTeaching(
        object $teaching,
        object $request
    ): void {
        $validated_request = UpdateTeachingData::from($request);
        event(new UpdatingTeaching($teaching, $validated_request));
    }

    public static function getTeaching(object $data): object
    {
        return TeachingService::getTeaching($data);
    }

    public static function deleteTeaching(object $teaching): void
    {
        DeleteTeachingAction::handle($teaching);
    }
}
