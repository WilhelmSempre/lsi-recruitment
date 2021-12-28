<?php

namespace App\Services;

use App\Entity\ReportFilter;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ReportService
 *
 * @package App\Services
 */
class ReportService
{

    /** @var EntityManagerInterface $entityManager */
    private EntityManagerInterface $entityManager;

    /**
     * ReportService constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return array
     */
    public function getAllReports(): array
    {
        return $this->entityManager
            ->getRepository('App\Entity\Report')
            ->findAll()
        ;
    }

    /**
     * @return array
     */
    public function getLocals(): array
    {
        return $this->entityManager
            ->getRepository('App\Entity\Report')
            ->findAll()
            ;
    }

    /**
     * @param ReportFilter $reportFilter
     *
     * @return array
     */
    public function filterReports(ReportFilter $reportFilter): array
    {
        return $this->entityManager
            ->getRepository('App\Entity\Report')
            ->getFilteredReports($reportFilter)
        ;
    }
}