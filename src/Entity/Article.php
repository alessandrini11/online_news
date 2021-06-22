<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"read:collection:article"}
 *              },
 *              "path" = "/article"
 *          },
 *          "post"={
 *              "denormalization_context"={
 *                  "groups"={"post:collection:article"}
 *              }
 *          }
 *     }
 * )
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $img;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="text")
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     *@Groups({"read:collection:article","post:collection:article"})
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, mappedBy="articles")
     * @Groups({"read:collection:article","post:collection:article"})
     */
    private $categories;

    /*
     * @Groups({"read:collection:article","post})
    */
    private $link;
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->link = "/article/".$this->id;
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
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
            $category->addArticle($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeArticle($this);
        }

        return $this;
    }
}
