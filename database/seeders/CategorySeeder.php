<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'title' => 'salvation',
                    
                ],
                [
                    'title' => 'peace',
                    
                ],
                [
                    'title' => 'encouragement',
                    
                ],
                [
                    'title' => 'relief',
                    
                ],
                [
                    'title' => 'comfort',
                    
                ],
                [
                    'title' => 'guidance',
                    
                ],
                [
                    'title' => 'protection',
                    
                ],
                [
                    'title' => 'courage',
                    
                ],
                [
                    'title' => 'rest',
                    
                ],
                [
                    'title' => 'strength',
                    
                ],
                [
                    'title' => 'warning',
                    
                ],
                [
                    'title' => 'forgiveness',
                    
                ],
                [
                    'title' => 'rejoicing',
                    
                ],
                [
                    'title' => 'praise',
                    
                ],
                [
                    'title' => 'hope',
                    
                ],
                [
                    'title' => 'faith',
                    
                ],
            
            ]

        );
    }
}
