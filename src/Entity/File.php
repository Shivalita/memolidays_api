<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FileRepository::class)
* @ApiFilter(SearchFilter::class,
*  properties={"souvenir": "exact"})
*/
class File
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("souvenir")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Souvenir::class, inversedBy="files")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"souvenir"})
     * @ApiProperty(readableLink=false, writableLink=false)
     */
    private $souvenir;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("souvenir")
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("souvenir")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("souvenir")
     */
    private $token;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSouvenir(): ?Souvenir
    {
        return $this->souvenir;
    }

    public function setSouvenir(?Souvenir $souvenir): self
    {
        $this->souvenir = $souvenir;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
