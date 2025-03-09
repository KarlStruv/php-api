<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\FakeDataService;

class UserModel
{
    protected string $name;

    public function __construct(FakeDataService $fakeDataService)
    {
        $userData = $fakeDataService->generateFakeUserData();
        $this->name = $userData['name'];
    }


    public function getName(): string
    {
        return $this->name;
    }
}
