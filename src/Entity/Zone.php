<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
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
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="zones")
     */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity=PointSurveillance::class, mappedBy="zone")
     */
    private $pointsurv;

    public function __construct()
    {
        $this->pointsurv = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection|PointSurveillance[]
     */
    public function getPointsurv(): Collection
    {
        return $this->pointsurv;
    }


    public function addPointsurv(PointSurveillance $pointsurv): self
    {
        if (!$this->pointsurv->contains($pointsurv)) {
            $this->pointsurv[] = $pointsurv;
            $pointsurv->setZone($this);
        }

        return $this;
    }

    public function removePointsurv(PointSurveillance $pointsurv): self
    {
        if ($this->pointsurv->removeElement($pointsurv)) {
            // set the owning side to null (unless already changed)
            if ($pointsurv->getZone() === $this) {
                $pointsurv->setZone(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

}
