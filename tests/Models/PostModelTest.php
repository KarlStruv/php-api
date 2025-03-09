<?php

declare(strict_types=1);

namespace Tests\Models;

use App\Models\PostModel;
use App\Services\FakeDataService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class PostModelTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetContent(): void
    {
        $fakeDataService = $this->createMock(FakeDataService::class);

        $fakePostData = ['content' => 'This is a test post content'];
        $fakeDataService->method('generateFakePostData')->willReturn($fakePostData);

        $postModel = new PostModel($fakeDataService);

        $content = $postModel->getContent();

        $this->assertEquals('This is a test post content', $content);
    }
}
