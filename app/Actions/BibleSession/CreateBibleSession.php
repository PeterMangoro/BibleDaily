<?php

namespace App\Actions\BibleSession;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateBibleSession
{
    public static function handle()
    {
        return DB::table('bible_sessions')->insertGetId([
            'user_id' => Auth::user()->id
        ]);
    }
}
