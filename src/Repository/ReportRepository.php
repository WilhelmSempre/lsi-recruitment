<?php

namespace App\Repository;

use App\Entity\Report;
use App\Entity\ReportFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use function Doctrine\ORM\QueryBuilder;

/**
 * @method Report|null find($id, $lockMode = null, $lockVersion = null)
 * @method Report|null findOneBy(array $criteria, array $orderBy = null)
 * @method Report[]    findAll()
 * @method Report[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportRepository extends ServiceEntityRepository
{

    /**
     * ReportRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Report::class);
    }

    /**
     * @param ReportFilter $reportFilter
     *
     * @return array
     */
    public function getFilteredReports(ReportFilter $reportFilter): array
    {
        $qb = $this->createQueryBuilder('r');

        $dateFrom = new \DateTime();

        $qb->select('r');

        if ($reportFilter->getDateFrom()) {
            $dateFrom = $reportFilter->getDateFrom();
        }

        $dateTo = new \DateTime();

        if ($reportFilter->getDateTo()) {
            $dateTo = $reportFilter->getDateTo();
        }

        $qb
            ->where($qb->expr()->between('r.createdAt',
                       "'" . $dateFrom->format('Y-m-d H:i:s') . "'",
                          "'" . $dateTo->format('Y-m-d H:i:s') . "'"
            ));

        if ($reportFilter->getLocal()) {
            $qb
                ->andWhere($qb->expr()->eq('r.local', "'" . $reportFilter->getLocal() . "'"));
        }

        return $qb
            ->getQuery()
            ->getResult()
        ;
    }
}
