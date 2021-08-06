<?php

namespace App\Entity;

use App\Repository\PointSurveillanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PointSurveillanceRepository::class)
 */
class PointSurveillance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cordonnes;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="pointsurv")
     */
    private $zone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCordonnes(): ?string
    {
        return $this->cordonnes;
    }

    public function setCordonnes(string $cordonnes): self
    {
        $this->cordonnes = $cordonnes;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }


}
