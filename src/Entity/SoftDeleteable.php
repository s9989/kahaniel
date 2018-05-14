<?php

namespace App\Entity;

trait SoftDeleteable
{
    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     * @var bool
     */
    private $deletedAt;

    /**
     * @return bool
     */
    public function isDeletedAt(): bool
    {
        return $this->deletedAt;
    }

    /**
     * @param bool $deletedAt
     * @return SoftDeleteable
     */
    public function setDeletedAt(bool $deletedAt): SoftDeleteable
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}