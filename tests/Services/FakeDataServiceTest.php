<?php

declare(strict_types=1);

namespace Tests\Services;

use App\Services\FakeDataService;
use PHPUnit\Framework\TestCase;

class FakeDataServiceTest extends TestCase
{
    public function testGenerateFakeUserData(): void
    {
        $fakeDataService = new FakeDataService();

        $userData = $fakeDataService->generateFakeUserData();

        $this->assertArrayHasKey('name', $userData);

        $this->assertIsString($userData['name']);
    }

    public function testGenerateFakePostData(): void
    {
        $fakeDataService = new FakeDataService();

        $postData = $fakeDataService->generateFakePostData();

        $this->assertArrayHasKey('content', $postData);

        $this->assertIsString($postData['content']);
    }
}
