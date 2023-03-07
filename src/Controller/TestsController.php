<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TestsController extends AbstractController
{
    public function first(): JsonResponse
    {
        return $this->json([
            'message' => 'Hello from first method',
        ]);
    }

    public function second(): JsonResponse
    {
        return $this->json([
            'message' => 'Second name says: ' /** . param */,
        ]);
    }

    public function third(int $digit): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Third name says: ' . $digit,
        ]);
    }

    public function fourth(Request $request, string $param): JsonResponse
    {
        $skipException = false;
        if (!$skipException) {
            throw new \Exception('Please read skipException parameter');
        }

        return new JsonResponse([
            'message' => 'Fourth name says: ' . $param,
        ]);
    }

    public function fifth(Request $request): JsonResponse
    {
        $firstParam = "Read param with name 'first'";

        $params = [];

        $message = "my 'first' param is '$firstParam' and all my params is {" . join(', ', $params) . '}';

        return new JsonResponse([
            'message' => 'Fifth name says: ' . $message,
        ]);
    }

    public function sixth(Request $request): JsonResponse
    {
        $requestData = $this->getRequestData($request);
        $message = $this->isGood($requestData)
            ? 'All your base are belong to us'
            : 'Somebody set up us the bomb';

        return new JsonResponse([
            'message' => 'Sixth name says: ' . $message,
        ]);
    }

    private function getRequestData(Request $request): array
    {
        return [];
    }

    private function isGood(array $requestData): bool
    {
        return isset($requestData['is_good']) && ($requestData['is_good'] === true);
    }
}