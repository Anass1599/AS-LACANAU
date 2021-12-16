<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="date")
     */
    private $publishdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coverFilenam;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPublishdAt(): ?\DateTimeInterface
    {
        return $this->publishdAt;
    }

    public function setPublishdAt(\DateTimeInterface $publishdAt): self
    {
        $this->publishdAt = $publishdAt;

        return $this;
    }

    public function getCoverFilenam(): ?string
    {
        return $this->coverFilenam;
    }

    public function setCoverFilenam(string $coverFilenam): self
    {
        $this->coverFilenam = $coverFilenam;

        return $this;
    }
}
