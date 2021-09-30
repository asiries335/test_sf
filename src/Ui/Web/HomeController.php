<?php


namespace App\Ui\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", methods="get", name="home_index")
     */
    public function index(){
        echo "hello";
    }
}