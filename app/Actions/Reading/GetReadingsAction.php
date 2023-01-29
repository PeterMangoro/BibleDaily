<?php

namespace App\Actions\Reading;

use Illuminate\Pagination\LengthAwarePaginator;

class GetReadingsAction
{
    public static function handle(object $data, ?int $paginate = 9): LengthAwarePaginator
    {
        $paginate = request('per_page') ?: $paginate;
        return $data
            ->selectDetailAttributes()
            ->search(request('search'))
            ->paginate($paginate)
            ->withQueryString();
    }
}
