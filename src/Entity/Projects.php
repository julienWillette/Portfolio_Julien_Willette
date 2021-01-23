<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectsRepository::class)
 */
class Projects
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_github;

    /**
     * @ORM\ManyToMany(targetEntity=Technos::class, inversedBy="projects")
     */
    private $techno;

    public function __construct()
    {
        $this->techno = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

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

    public function getUrlGithub(): ?string
    {
        return $this->url_github;
    }

    public function setUrlGithub(?string $url_github): self
    {
        $this->url_github = $url_github;

        return $this;
    }

    /**
     * @return Collection|Technos[]
     */
    public function getTechno(): Collection
    {
        return $this->techno;
    }

    public function addTechno(Technos $techno): self
    {
        if (!$this->techno->contains($techno)) {
            $this->techno[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Technos $techno): self
    {
        $this->techno->removeElement($techno);

        return $this;
    }
}
