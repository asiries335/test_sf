<?php


namespace App\Repository;


use App\Contracts\EntityContract;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Exception;

abstract class BaseRepository extends ServiceEntityRepository
{
    public function store(EntityContract $entityContract): bool {
        try {
            $this->getEntityManager()->persist($entityContract);
            $this->getEntityManager()->flush();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return true;
    }
}