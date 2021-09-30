<?php


namespace App\Ui\Api\V1;

use App\Service\Client\Actions\CreateClientAction;
use App\Service\Client\Dto\CreateClientDTO;
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

    /**
     * @Route("/create", methods="POST", name="client_create")
     * @throws \Exception
     */
    public function create(Request $request, CreateClientAction $createClientAction) {
        $dto = new CreateClientDTO('wewer', 'wfewef', 'wef@fsd.r', 'werwerwer');

        $client = $createClientAction->run($dto);

        return $client;


    }

    public function find() {

    }

    public function list(){
        dd(1);
    }
}