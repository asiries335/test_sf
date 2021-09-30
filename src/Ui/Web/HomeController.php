<?php


namespace App\Ui\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", methods="get", name="home_index")
     */
    public function index(): JsonResponse {
        return $this->json('hello :)');
    }
}