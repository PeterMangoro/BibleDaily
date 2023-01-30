<?php

namespace App\Actions\Teaching;

class DeleteTeachingAction
{
    public static function handle(object $teaching): void
    {
        $teaching->delete();
    }
}
