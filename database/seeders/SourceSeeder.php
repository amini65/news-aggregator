<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'secret_key'=>'',
                'url'=>''
            ],
            [
                'name'=>'newsAPI',
                'access_key'=>'',
                'secret_key'=>'',
                'url'=>''
            ],
            [
                'name'=>'OpenNews',
                'access_key'=>'',
                'secret_key'=>'',
                'url'=>''
            ]
        ];
        foreach ($sources as $source) {
            Source::create([
                'name'=>$source['name'],
                'access_key'=>$source['access_key'],
                'secret_key'=>$source['secret_key'],
                'url'=>$source['url']
            ]);
        }

    }
}
