<?php


namespace App\Repository;

use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method void store(Client $application)
 * @method void remove(Client $application)
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method array paginate(int $page, int $size)
 */
class ClientRepository extends BaseRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Client::class);
    }
}