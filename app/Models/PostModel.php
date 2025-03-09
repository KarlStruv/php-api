<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\FakeDataService;

class PostModel
{
    protected mixed $content;

    public function __construct(FakeDataService $fakeDataService)
    {
        $postData = $fakeDataService->generateFakePostData();
        $this->content = $postData['content'];
    }

    public function getContent()
    {
        return $this->content;
    }
}
