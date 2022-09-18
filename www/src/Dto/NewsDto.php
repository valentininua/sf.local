<?php

declare(strict_types=1);

namespace Api\Dto;

class NewsDto
{
    private ?int $id = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?string $image = null;
    private ?\DateTime $createAt = null;
    private ?\DateTime $updateAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUpdateAt(): ?\DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    public function getCreateAt(): ?\DateTime
    {
        return $this->createAt;
    }

    public function setCreateAt(?\DateTime $createAt): void
    {
        $this->updateAt = $createAt;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

}
