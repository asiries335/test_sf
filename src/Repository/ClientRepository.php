<?php


namespace App\Repository;

use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;

class ClientRepository extends BaseRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Client::class);
    }
}