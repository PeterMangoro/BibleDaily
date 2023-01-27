<?php

namespace App\Actions\Teaching;

use Illuminate\Pagination\LengthAwarePaginator;

class GetTeachingsAction
{
    public static function handle(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return
            $data
            ->selectDetailAttributes()
            ->paginate($paginate);
    }

    // public static function handle_one(object $data): object
    // {
    //     return
    //         $data
    //         // ->selectDetailAttributes()
    //         ->first();
    // }
}
