<?php

namespace App\View\Camp\Dashboard;

use App\DataObjects\Display\DisplayChristianData;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;
use Illuminate\Pagination\LengthAwarePaginator;

class ChristianProps extends BaseView
{
    public function __construct(
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
            );
    }

    public function path(): string
    {
        return $this->path;
    }

    /**
     * @return array<int , string>
     */
    public function filters(): array
    {
        return Filters::filters();
    }
}
