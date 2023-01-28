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
    public static function get_teachings(object $data, ?int $paginate = 9):LengthAwarePaginator
    {
        return TeachingService::get_teachings($data, $paginate);
    }

    public static function store_teaching(object $request):void
    {
        $validated_request = CreateTeachingData::from($request);
        event(new CreatingTeaching($validated_request));
    }

    public static function update_teaching(object $teaching, object $request):void
    {
        $validated_request = UpdateTeachingData::from($request);
        event(new UpdatingTeaching($teaching, $validated_request));
    }

    public static function get_teaching(object $data):object
    {
        return TeachingService::get_teaching($data);
    }

    public static function delete_teaching(object $teaching):void
    {
         DeleteTeachingAction::handle($teaching);
    }
}
