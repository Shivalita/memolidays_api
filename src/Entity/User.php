<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $google_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_premium;

    /**
     * @ORM\OneToMany(targetEntity=Pin::class, mappedBy="user", orphanRemoval=true)
     */
    private $pins;

    // public function __construct()
    // {
    //     $this->pins = new ArrayCollection();
    // }

    /**
    * @ORM\OneToMany(targetEntity=Category::class, mappedBy="user_id", orphanRemoval=true)
    */
    private $categories;

    /**
    * @ORM\OneToMany(targetEntity=Souvenir::class, mappedBy="user", orphanRemoval=true)
    */
    private $souvenirs;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->souvenirs = new ArrayCollection();
        $this->pins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoogleId(): ?string
    {
        return $this->google_id;
    }

    public function setGoogleId(string $google_id): self
    {
        $this->google_id = $google_id;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getIsPremium(): ?bool
    {
        return $this->is_premium;
    }

    public function setIsPremium(bool $is_premium): self
    {
        $this->is_premium = $is_premium;

        return $this;
    }

    /**
     * @return Collection|Category[]
    */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setUserId($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getUserId() === $this) {
                $category->setUserId(null);
            }
        }

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
            $souvenir->setUser($this);
        }

        return $this;
    }

    public function removeSouvenir(Souvenir $souvenir): self
    {
        if ($this->souvenirs->removeElement($souvenir)) {
            // set the owning side to null (unless already changed)
            if ($souvenir->getUser() === $this) {
                $souvenir->setUser(null);
            }
        }

        return $this;
    }

}
