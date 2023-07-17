<?php

namespace App\Entity;

use App\Repository\DataTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataTypeRepository::class)]
class DataType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $valueType = null;

    #[ORM\OneToMany(mappedBy: 'dataType_id', targetEntity: DataHistory::class)]
    private Collection $dataHistories;

    public function __construct()
    {
        $this->dataHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getValueType(): ?string
    {
        return $this->valueType;
    }

    public function setValueType(string $valueType): static
    {
        $this->valueType = $valueType;

        return $this;
    }

    /**
     * @return Collection<int, DataHistory>
     */
    public function getDataHistories(): Collection
    {
        return $this->dataHistories;
    }

    public function addDataHistory(DataHistory $dataHistory): static
    {
        if (!$this->dataHistories->contains($dataHistory)) {
            $this->dataHistories->add($dataHistory);
            $dataHistory->setDataTypeId($this);
        }

        return $this;
    }

    public function removeDataHistory(DataHistory $dataHistory): static
    {
        if ($this->dataHistories->removeElement($dataHistory)) {
            // set the owning side to null (unless already changed)
            if ($dataHistory->getDataTypeId() === $this) {
                $dataHistory->setDataTypeId(null);
            }
        }

        return $this;
    }
}
