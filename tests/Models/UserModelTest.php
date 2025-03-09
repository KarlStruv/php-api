<?php

declare(strict_types=1);

namespace Tests\Models;

use App\Models\UserModel;
use App\Services\FakeDataService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetName(): void
    {
        $fakeDataService = $this->createMock(FakeDataService::class);

        $fakeUserData = ['name' => 'Test User'];
        $fakeDataService->method('generateFakeUserData')->willReturn($fakeUserData);

        $userModel = new UserModel($fakeDataService);

        $name = $userModel->getName();

        $this->assertEquals('Test User', $name);
    }
}
