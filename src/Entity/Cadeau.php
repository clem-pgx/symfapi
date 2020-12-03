<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CadeauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"cadeau:read"}},
 *     denormalizationContext={"groups"={"cadeau:write"}}
 * )
 * @ORM\Entity(repositoryClass=CadeauRepository::class)
 */
class Cadeau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"cadeau:read", "listeSouhait:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"cadeau:read", "cadeau:write", "listeSouhait:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Groups({"cadeau:read", "cadeau:write", "listeSouhait:read"})
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"cadeau:read", "cadeau:write", "listeSouhait:read"})
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Groups({"cadeau:read", "cadeau:write", "listeSouhait:read"})
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=ListeSouhait::class, inversedBy="cadeaus")
     * @ORM\JoinColumn(nullable=false)
     * 
     * @Groups("cadeau:write")
     */
    private $listeSouhait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getListeSouhait(): ?ListeSouhait
    {
        return $this->listeSouhait;
    }

    public function setListeSouhait(?ListeSouhait $listeSouhait): self
    {
        $this->listeSouhait = $listeSouhait;

        return $this;
    }
}
