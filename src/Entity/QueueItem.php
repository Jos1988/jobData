<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use MongoDB\Exception\UnexpectedValueException;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\QueueItemRepository")
 */
class QueueItem
{

    public const STATUS_OPEN = 'open';
    public const STATUS_CRAWLED = 'crawled';
    public const STATUS_ASSIGNED = 'assigned';

    public const SOURCE_MONSTER_COM = 'monster_com';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $source;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sourceId;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        if (!in_array($source, [self::SOURCE_MONSTER_COM])) {
            throw new UnexpectedValueException("Invalid value \"{$source}\" for queue source.");
        }

        $this->source = $source;

        return $this;
    }

    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    public function setSourceId(string $sourceId): self
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    public function getStatus():string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        if (!in_array($status, [self::STATUS_OPEN, self::STATUS_CRAWLED, self::STATUS_ASSIGNED])) {
            throw new UnexpectedValueException("Invalid value \"{$status}\" for queue status.");
        }

        $this->status = $status;
    }
}
