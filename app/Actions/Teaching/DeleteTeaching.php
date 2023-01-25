<?php 
namespace App\Actions\Teaching;

class DeleteTeaching
{
    public static function handle(object $teaching)
    {
        $teaching->delete();
    }
}