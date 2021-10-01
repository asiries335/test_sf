<?php


namespace App\Repository;


use App\Entity\Application;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method void store(Application $application)
 * @method void remove(Application $application)
 * @method Application|null find($id, $lockMode = null, $lockVersion = null)
 * @method array paginate(int $page, int $size)
 */
class ApplicationRepository extends BaseRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Application::class);
    }
}