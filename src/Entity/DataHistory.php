<?php

namespace App\Entity;

use App\Repository\DataHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataHistoryRepository::class)]
class DataHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'dataHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Module $module_id = null;

    #[ORM\ManyToOne(inversedBy: 'dataHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataType $dataType_id = null;

    #[ORM\Column]
    private ?int $value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModuleId(): ?Module
    {
        return $this->module_id;
    }

    public function setModuleId(?Module $module_id): static
    {
        $this->module_id = $module_id;

        return $this;
    }

    public function getDataTypeId(): ?DataType
    {
        return $this->dataType_id;
    }

    public function setDataTypeId(?DataType $dataType_id): static
    {
        $this->dataType_id = $dataType_id;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }
}
