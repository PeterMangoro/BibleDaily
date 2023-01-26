<?php

namespace App\Actions\Reading;

use Illuminate\Pagination\LengthAwarePaginator;

class GetReadingsAction
{
    public static function handle(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        return
            $data
            ->selectDetailAttributes()
            ->paginate($paginate);
    }
}