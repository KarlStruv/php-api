<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PostModel;
use App\Services\FakeDataService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    private FakeDataService $fakeDataService;

    public function __construct(FakeDataService $fakeDataService)
    {
        $this->fakeDataService = $fakeDataService;
    }

    public function getUser(Request $request, Response $response): Response
    {
        $userData = new UserModel($this->fakeDataService);

        $response->getBody()->write(json_encode($userData->getName()));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

    public function getUserPosts(Request $request, Response $response): Response
    {
        $postData = new PostModel($this->fakeDataService);

        $response->getBody()->write(json_encode($postData->getContent()));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
