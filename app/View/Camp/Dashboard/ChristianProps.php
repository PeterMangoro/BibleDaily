<?php

namespace App\View\Camp\Dashboard;

use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DataObjects\Display\DisplayChristianData;

class ChristianProps extends BaseView
{
    function __construct(
        public readonly object $data,
        public readonly string $path,

    ) {
    }

    public function users(): LengthAwarePaginator
    {
        return $this->data
            ->search(request('search'))
            ->latest('id')
            ->paginate(15)->through(
                fn ($christian) => DisplayChristianData::from($christian),
            );;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function filters(): array
    {
        return Filters::filters();
    }
}
