<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 */
class Report
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $customer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $local;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $date
     *
     * @return $this
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     *
     * @return $this
     */
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocal(): ?string
    {
        return $this->local;
    }

    /**
     * @param string $local
     *
     * @return $this
     */
    public function setLocal(string $local): self
    {
        $this->local = $local;

        return $this;
    }
}
