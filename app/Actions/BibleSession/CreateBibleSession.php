<?php

namespace App\Actions\BibleSession;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateBibleSession
{
    public static function handle():int
    {
        return DB::table('bible_sessions')->insert([
            'user_id' => Auth::user()->id,
            'uuid'=> str()->uuid()->toString(),
        ]);
    }
}
