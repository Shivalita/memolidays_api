<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PinRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PinRepository::class)
 */
class Pin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("category")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("category")
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("category")
     */
    private $color;

    /**
     * @ORM\OneToOne(targetEntity=Category::class, mappedBy="pin", cascade={"persist", "remove"})
     * @Groups({"category"})
     * @ApiProperty(readableLink=false, writableLink=false)
     */
    private $category;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        // set (or unset) the owning side of the relation if necessary
        $newPin_id = null === $category ? null : $this;
        if ($category->getPin() !== $newPin_id) {
            $category->setPin($newPin_id);
        }

        return $this;
    }

}
