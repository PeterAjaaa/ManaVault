<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $json = File::get(database_path('/seeders/cards.json'));
        $cards = json_decode($json, true);
        $sets = DB::table('card_sets')->pluck('id', 'name')->mapWithKeys(fn($id, $name) => [strtoupper($name) => $id])->toArray();
        $chunkSize = 500;
        $cardData = [];

        foreach ($cards as $card) {
            $setId = $sets[strtoupper($card['set_name'])] ?? null;
            $imageUrlFront = null;
            $imageUrlBack = null;

            if (isset($card['card_faces']) && is_array($card['card_faces'])) {
                $imageUrlFront = $card['card_faces'][0]['image_uris']['large'] ?? null;
                $imageUrlBack = $card['card_faces'][1]['image_uris']['large'] ?? null;

                if (!$imageUrlFront && !$imageUrlBack) {
                    $imageUrlFront = $card['image_uris']['large'] ?? null;
                }
            } else {
                $imageUrlFront = $card['image_uris']['large'] ?? null;
            }

            if ($setId) {
                $cardData[] = [
                    'name' => $card['name'],
                    'set_id' => $setId,
                    'image_url_front' => $imageUrlFront,
                    'image_url_back' => $imageUrlBack,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if (count($cardData) === $chunkSize) {
                DB::table('cards')->insert($cardData);
                $cardData = [];
            }
        }

        if (!empty($cardData)) {
            DB::table('cards')->insert($cardData);
        }
    }
}
