<?php

namespace App\Entity;

use DateTime;

/**
 * Class ReportFilter
 *
 * @package App\Entity
 */
class ReportFilter
{

    /**
     * @var string|null $local
     */
    private ?string $local = null;

    /**
     * @var DateTime|null $dateFrom
     */
    private ?DateTime $dateFrom = null;

    /**
     * @var DateTime|null $dateTo
     */
    private ?DateTime $dateTo = null;

    /**
     * @return string
     */
    public function getLocal(): ?string
    {
        return $this->local;
    }

    /**
     * @param string|null $local
     *
     * @return ReportFilter
     */
    public function setLocal(?string $local): self
    {
        $this->local = $local;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom(): ?DateTime
    {
        return $this->dateFrom;
    }

    /**
     * @param DateTime|null $dateFrom
     *
     * @return ReportFilter
     */
    public function setDateFrom(?DateTime $dateFrom): self
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateTo(): ?DateTime
    {
        return $this->dateTo;
    }

    /**
     * @param DateTime|null $dateTo
     *
     * @return ReportFilter
     */
    public function setDateTo(?DateTime $dateTo): self
    {
        $this->dateTo = $dateTo;

        return $this;
    }
}