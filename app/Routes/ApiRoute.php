<?php

declare(strict_types=1);

global $app;

use App\Controllers\UserController;

$app->get('/user', [UserController::class, 'getUser']);

$app->get('/user/{id}/post', [UserController::class, 'getUserPosts']);
