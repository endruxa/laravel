<?php

use Illuminate\Database\Seeder;

class TagSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Бизнес',
            'Культура',
            'Спорт',
            'Финансы',
            'Политика',
            'Юмор'
        ];
        foreach ($tags as $tag)
        {
            \App\Tag::create(['title'=>$tag]);
        }
    }
}
