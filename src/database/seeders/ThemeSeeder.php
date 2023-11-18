<?php

namespace Wjurry\RedParts\seeders;

use App\Models\Theme;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        try {
            Theme::query()->where('name', 'RedParts')->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            Theme::factory()->createOne([
                "name" => "RedParts",
                "slug" => "redparts",
                "author" => "Kos9",
                "author_website" => "https://google.com",
                "version" => "1.0",
                "is_active" => 0,
            ]);
        }
    }
}