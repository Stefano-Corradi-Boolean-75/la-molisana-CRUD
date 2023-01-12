<?php

namespace Database\Seeders;

use App\Models\Pasta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_pastas = config('db.products');

        foreach ($array_pastas as $pasta_item) {
            $new_pasta = new Pasta();
            $new_pasta->title = $pasta_item['titolo'];
            $new_pasta->slug = Pasta::generateSlug($new_pasta->title);
            $new_pasta->image = $pasta_item['src'];
            $new_pasta->image_h = $pasta_item['src-h'];
            $new_pasta->image_p = $pasta_item['src-p'];
            $new_pasta->type = $pasta_item['tipo'];
            $new_pasta->cooking_time = $pasta_item['cottura'];
            $new_pasta->weight = $pasta_item['peso'];
            $new_pasta->description = $pasta_item['descrizione'];
            $new_pasta->save();
        }

    }
}
