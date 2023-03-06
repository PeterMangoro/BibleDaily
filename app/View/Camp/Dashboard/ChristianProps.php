<?php

namespace App\View\Camp\Dashboard;

use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Illuminate\Pagination\LengthAwarePaginator;

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
            ->paginate(15);
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
