<?php


namespace App\Repository;


use App\Contracts\EntityContract;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Exception;
use LogicException;

abstract class BaseRepository extends ServiceEntityRepository
{
    /**
     * @param EntityContract $entityContract
     * @throws Exception
     */
    public function store(EntityContract $entityContract): void {
        try {
            $this->getEntityManager()->persist($entityContract);
            $this->getEntityManager()->flush();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param EntityContract $entityContract
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(EntityContract $entityContract): void {
        $this->getEntityManager()->remove($entityContract);
        $this->getEntityManager()->flush();
    }

    /**
     * @param int $page
     * @param int $size
     * @return array
     */
    public function paginate(int $page, int $size): array {
        if ($page < 1 || $size < 1) {
            throw new LogicException('Page и Size должны быть больше нуля');
        }

        $query = $this->createQueryBuilder('c');

        $paginator = new Paginator($query);

        $totalItems = count($paginator);

        $pagesCount = ceil($totalItems / $size);

        $results = $paginator
            ->getQuery()
            ->setFirstResult($size * ($page - 1))
            ->setMaxResults($size);

        return [
            'items' => $results->getResult(),
            'pagination' => [
                'totalItems' => $totalItems,
                'pagesCount' => (int)$pagesCount,
            ],
        ];
    }
}