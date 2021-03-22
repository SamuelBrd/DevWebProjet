<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nameEvent;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $typeEvent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEvent;

    /**
     * @ORM\Column(type="integer")
     */
    private $dureeEvent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameEvent(): ?string
    {
        return $this->nameEvent;
    }

    public function setNameEvent(string $nameEvent): self
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

    public function getTypeEvent(): ?string
    {
        return $this->typeEvent;
    }

    public function setTypeEvent(string $typeEvent): self
    {
        $this->typeEvent = $typeEvent;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->dateEvent;
    }

    public function setDateEvent(\DateTimeInterface $dateEvent): self
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    public function getDureeEvent(): ?int
    {
        return $this->dureeEvent;
    }

    public function setDureeEvent(int $dureeEvent): self
    {
        $this->dureeEvent = $dureeEvent;

        return $this;
    }

    /**
    * @return Evenement[]
    */
    public function getEventNonExpires()
    {
        $qb = $this->createQueryBuilder('s')
        ->where('s.dateEvent + s.dureeEvent > :date')
        ->setParameter('date', new \DateTime())
        ->orderBy('s.dateEvent', 'DESC');
        return $qb->getQuery()->getResult();
    }
}
