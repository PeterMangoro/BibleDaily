<?php

namespace Database\Seeders;

use App\Models\BibleBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BibleBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        BibleBook::truncate();
        $csvData = fopen(base_path('database/csv/bible_books.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                BibleBook::create([
                    'alais' => $data['1'],
                    'title' => $data['2'],
                    'chapters' => $data['3'],
                    'testament' => $data['4'],
                    // 'city' => $data['4'],
                    // 'us_zip' => $data['5'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }

    
}
