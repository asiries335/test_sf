<?php


namespace App\Ui\Api\V1;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Controller used to manage clients
 *
 * @Route("/api/v1/clients")
 *
 */
class ClientController extends AbstractController
{
    public function __construct() {

    }

    /**
     * @Route("/create", methods="POST", name="client_create")
     */
    public function create(Request $request) {
    }

    public function find() {

    }

    public function list(){
        dd(1);
    }
}