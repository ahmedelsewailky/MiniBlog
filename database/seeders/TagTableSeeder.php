<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_array = ['laravel', 'symphony', 'cake', 'perl', 'java', 'c#', 'html', 'css', 'sass', 'gulp', 'php', 'python', 'bootstrap', 'wordpress', 'vue', 'react', 'firebase', 'angular'];
        
        for ($i=0; $i < count($tags_array); $i++) { 
            $dataTags[] = [
                'name' => $tags_array[$i],
                'slug' => Str::slug($tags_array[$i])
            ];
        };

        foreach ($dataTags as $tag) {
            Tag::create($tag);
        }
    }
}
