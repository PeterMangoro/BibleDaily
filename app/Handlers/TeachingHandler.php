<?php

namespace App\Handlers;

use App\Services\TeachingService;
use App\Events\Create\CreatingTeaching;
use App\Events\Update\UpdatingTeaching;
use App\Actions\Teaching\DeleteTeaching;
use App\DataObjects\Create\CreateTeachingData;
use App\DataObjects\Update\UpdateTeachingData;

class TeachingHandler
{
    public static function get_teachings(object $data, ?int $paginate = 9)
    {
        return TeachingService::get_teachings($data, $paginate);
    }

    public static function store_teaching(object $request)
    {
        $validated_request = CreateTeachingData::from($request);
        event(new CreatingTeaching($validated_request));
    }

    public static function update_teaching(object $teaching, object $request)
    {
        $validated_request = UpdateTeachingData::from($request);
        event(new UpdatingTeaching($teaching, $validated_request));
    }

    public static function get_teaching(object $data)
    {
        return TeachingService::get_teaching($data);
    }

    public static function delete_teaching(object $teaching,)
    {
        return DeleteTeaching::handle($teaching);
    }
}
