<?php


namespace App\Ui\Api\V1;

use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Services\Client\Actions\CreateClientActionContract;
use App\Services\Client\Dto\CreateClientDTOContract;
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
    public function create(Request $request, CreateClientActionContract $createClientAction) {
        $dto = new CreateClientDTOContract('wewer', 'wfewef', 'wef@fsd.r', 'werwerwer');

        $client = $createClientAction->run($dto);

        return $client;


    }

    public function find() {

    }

    public function list(){
        dd(1);
    }
}