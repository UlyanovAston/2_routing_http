<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AnnotationsController extends AbstractController
{
    /**
     * @Route("/annotations/tests")
     */
    public function byAnnotation(): JsonResponse
    {
        return $this->json([
            'message' => 'Route be annotation'
        ]);
    }

    /**
     * @Route("/annotations/tests/another")
     */
    public function anotherByAnnotation(): JsonResponse
    {
        return $this->json([
            'message' => 'Another route be annotation'
        ]);
    }

    /**
     * @Route("/annotations/tests/wtf")
     */
    public function wtf(): JsonResponse
    {
        throw new AccessDeniedHttpException('Papers, please');
    }
}
