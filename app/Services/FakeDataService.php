<?php

declare(strict_types=1);

namespace App\Services;

use Faker\Factory as FakerFactory;
use Faker\Generator;

class FakeDataService
{
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    public function generateFakeUserData(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }

    public function generateFakePostData(): array
    {
        return [
            'content' => $this->faker->text(),
        ];
    }
}
