<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      attributes={
 *          "fetchEager": false,
 *          "normalization_context"={"groups"={"category"},"enable_max_depth"=true},
 *          "denormalization_context"={"groups"={"category"}, "enable_max_depth"=true},
 *      },
*      itemOperations={"get", "put", "delete", "patch"={
 *              "input_formats"={"json"={"application/merge-patch+json"}}
 *      }},
 * )
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ApiFilter(SearchFilter::class,
 *  properties={"user": "exact"})
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"souvenir", "category"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"souvenir", "category"})
     * @ApiProperty(readableLink=false, writableLink=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"souvenir", "category"})
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Pin::class, inversedBy="category", cascade={"persist", "remove"})
     * @Groups({"souvenir", "category"})
     */ 
    private $pin;

    /**
     * @ORM\ManyToMany(targetEntity=Souvenir::class, mappedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"souvenir", "category"})
     * @ApiProperty(readableLink=false, writableLink=false)
     * @Assert\NotNull()
     */
    private $souvenirs;


    public function __construct()
    {
        $this->souvenirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPin(): ?Pin
    {
        return $this->pin;
    }

    public function setPin(?Pin $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * @return Collection|Souvenir[]
     */
    public function getSouvenirs(): Collection
    {
        return $this->souvenirs;
    }

    public function addSouvenir(Souvenir $souvenir): self
    {
        if (!$this->souvenirs->contains($souvenir)) {
            $this->souvenirs[] = $souvenir;
            $souvenir->addCategory($this);
        }

        return $this;
    }

    public function removeSouvenir(Souvenir $souvenir): self
    {
        if ($this->souvenirs->removeElement($souvenir)) {
            $souvenir->removeCategory($this);
        }

        return $this;
    }
}
