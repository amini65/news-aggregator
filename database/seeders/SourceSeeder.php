<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources=[
            [
                'name'=>'guardian',
                'access_key'=>'',
                'secret_key'=>'test',
                'url'=>'https://content.guardianapis.com/search',
                'categories'=>['politics/politics']
            ],
            [
                'name'=>'newsAPI',
                'access_key'=>'',
                'secret_key'=>'ff69e6f46bc94370b5962b12e821ca5e',
                'url'=>'https://newsapi.org/v2/everything',
                'categories'=>['sport','business','science','general']
            ]
        ];
        foreach ($sources as $source) {

            $sourceInstance=Source::create([
                'name'=>$source['name'],
                'access_key'=>$source['access_key'],
                'secret_key'=>$source['secret_key'],
                'url'=>$source['url']
            ]);

            foreach ($source['categories'] as $category) {

                $category=Category::query()->firstOrCreate(['name'=>$category]);
                $sourceInstance->categories()->attach([$category->id]);
            }


        }

    }
}
