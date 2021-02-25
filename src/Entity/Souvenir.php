<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SouvenirRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;


/**
 * @ORM\Entity(repositoryClass=SouvenirRepository::class)
 * @ApiResource(
 *      attributes={
 *          "order"={"event_date":"DESC"},
 *          "fetchEager": false,
 *          "normalization_context"={"groups"={"souvenir"},"enable_max_depth"=true},
 *      },
 *      itemOperations={"get", "put", "delete", "patch"={
 *              "input_formats"={"json"={"application/merge-patch+json"}}
 *      }},
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "user": "exact",
 *     "categories": "exact"
 * })
 */
class Souvenir
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"souvenir"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="souvenirs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"souvenir"})
     * @ApiProperty(readableLink=false, writableLink=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"souvenir"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"souvenir"})
     */
    private $cover;

    /**
     * @ORM\Column(type="date")
     * @Groups({"souvenir"})
     */
    private $event_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"souvenir"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"souvenir"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"souvenir"})
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"souvenir"})
     */
    private $address;

    /**
     * @ORM\Column(type="float")
     * @Groups({"souvenir"})
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     * @Groups({"souvenir"})
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"souvenir"})
     */
    private $place;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"souvenir"})
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="souvenirs")
     * @Groups({"souvenir"})
     * @ApiProperty(readableLink=false, writableLink=false)
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=File::class, mappedBy="souvenir", orphanRemoval=true)
     * @Groups({"souvenir"})
     */
    private $files;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->files = new ArrayCollection();
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->event_date;
    }

    public function setEventDate(\DateTimeInterface $event_date): self
    {
        $this->event_date = $event_date;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setSouvenir($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getSouvenir() === $this) {
                $file->setSouvenir(null);
            }
        }

        return $this;
    }
}
