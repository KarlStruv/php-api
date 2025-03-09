<?php

declare(strict_types=1);

global $app;

use App\Controllers\UserController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response, $args) {
    $response
        ->getBody()
        ->write('Welcome to the PHP Users and User Posts API. 
        Please refer to "/user" and "/user/{id}/post" endpoints for the functionality.');
    return $response;
});

$app->get('/user', [UserController::class, 'getUser']);

$app->get('/user/{id}/post', [UserController::class, 'getUserPosts']);
