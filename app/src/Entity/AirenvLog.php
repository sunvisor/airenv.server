<?php
/** @noinspection PhpPropertyOnlyWrittenInspection */

namespace App\Entity;

use App\Repository\AirenvLogRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AirenvLogRepository::class)
 */
class AirenvLog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private DateTimeInterface $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $place;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $item_name;

    /**
     * @ORM\Column(type="float")
     */
    private float $item_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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

    public function getItemName(): string
    {
        return $this->item_name;
    }

    public function setItemName(string $item_name): self
    {
        $this->item_name = $item_name;

        return $this;
    }

    public function getItemValue(): float
    {
        return $this->item_value;
    }

    public function setItemValue(float $item_value): self
    {
        $this->item_value = $item_value;

        return $this;
    }
}
