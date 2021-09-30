<?php


namespace App\Repository;


use App\Entity\Application;
use Doctrine\Persistence\ManagerRegistry;

class AppRepository extends BaseRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Application::class);
    }
}