<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ListeSouhaitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"listeSouhait:read"}},
 *     denormalizationContext={"groups"={"listeSouhait:write"}}
 * )
 * @ORM\Entity(repositoryClass=ListeSouhaitRepository::class)
 */
class ListeSouhait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("listeSouhait:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"listeSouhait:read", "listeSouhait:write"})
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Cadeau::class, mappedBy="listeSouhait")
     * 
     * @Groups("listeSouhait:read")
     */
    private $cadeaus;

    public function __construct()
    {
        $this->cadeaus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Cadeau[]
     */
    public function getCadeaus(): Collection
    {
        return $this->cadeaus;
    }

    public function addCadeau(Cadeau $cadeau): self
    {
        if (!$this->cadeaus->contains($cadeau)) {
            $this->cadeaus[] = $cadeau;
            $cadeau->setListeSouhait($this);
        }

        return $this;
    }

    public function removeCadeau(Cadeau $cadeau): self
    {
        if ($this->cadeaus->removeElement($cadeau)) {
            // set the owning side to null (unless already changed)
            if ($cadeau->getListeSouhait() === $this) {
                $cadeau->setListeSouhait(null);
            }
        }

        return $this;
    }
}
