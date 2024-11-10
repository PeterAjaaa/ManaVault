<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CardSetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/cards.json'));
        $sets = json_decode($json, true);

        $chunkSize = 500;
        $setData = [];

        foreach ($sets as $set) {
            $setData[] = [
                'name' => $set['set_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($setData) === $chunkSize) {
                DB::table('card_sets')->insert($setData);
                $setData = [];
            }
        }

        if (!empty($setData)) {
            DB::table('card_sets')->insert($setData);
        }
    }
}
