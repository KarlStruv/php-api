<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\UserController;
use App\Services\FakeDataService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Response;

class UserControllerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetUser(): void
    {
        //Mocking the data that will be returned when testing FakeDataService
        $fakeDataService = $this->createMock(FakeDataService::class);
        $fakeUserData = ['name' => 'Test User'];
        $fakeDataService->method('generateFakeUserData')->willReturn($fakeUserData);

        //Create new instance of the Controller
        $userController = new UserController($fakeDataService);

        //Create mock request
        $request = $this->createMock(ServerRequestInterface::class);

        //Create a new instance of Response
        $response = new Response();

        //Retrieve the response data and decode from JSON format
        $response = $userController->getUser($request, $response);
        $responseBody = (string)$response->getBody();
        $decodedJson = json_decode($responseBody, true);

        //Test if Status Code is correct
        $this->assertEquals(201, $response->getStatusCode());

        //Test if the decoded response is string(meaning that the original response is JSON)
        $this->assertIsString($decodedJson);

        //Test if returned data matches mocked data
        $this->assertEquals('Test User', $decodedJson);
    }

    /**
     * @throws Exception
     */
    public function testGetUserPosts(): void
    {
        $fakeDataService = $this->createMock(FakeDataService::class);

        $fakePostData = ['content' => 'Test post content'];
        $fakeDataService->method('generateFakePostData')->willReturn($fakePostData);

        $controller = new UserController($fakeDataService);

        $request = $this->createMock(ServerRequestInterface::class);

        $response = new Response();

        $response = $controller->getUserPosts($request, $response);

        $responseBody = (string)$response->getBody();
        $decodedJson = json_decode($responseBody, true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertIsString($decodedJson);
        $this->assertEquals('Test post content', $decodedJson);
    }

}
