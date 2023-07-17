<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $ActiveDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $addedDate = null;

    #[ORM\OneToMany(mappedBy: 'module_id', targetEntity: WorkingHistory::class)]
    private Collection $workingHistories;

    #[ORM\OneToMany(mappedBy: 'module_id', targetEntity: DataHistory::class)]
    private Collection $dataHistories;

    public function __construct()
    {
        $this->workingHistories = new ArrayCollection();
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

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getActiveDate(): ?\DateTimeInterface
    {
        return $this->ActiveDate;
    }

    public function setActiveDate(\DateTimeInterface $ActiveDate): static
    {
        $this->ActiveDate = $ActiveDate;

        return $this;
    }

    public function getAddedDate(): ?\DateTimeInterface
    {
        return $this->addedDate;
    }

    public function setAddedDate(\DateTimeInterface $addedDate): static
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    /**
     * @return Collection<int, WorkingHistory>
     */
    public function getWorkingHistories(): Collection
    {
        return $this->workingHistories;
    }

    public function addWorkingHistory(WorkingHistory $workingHistory): static
    {
        if (!$this->workingHistories->contains($workingHistory)) {
            $this->workingHistories->add($workingHistory);
            $workingHistory->setModuleId($this);
        }

        return $this;
    }

    public function removeWorkingHistory(WorkingHistory $workingHistory): static
    {
        if ($this->workingHistories->removeElement($workingHistory)) {
            // set the owning side to null (unless already changed)
            if ($workingHistory->getModuleId() === $this) {
                $workingHistory->setModuleId(null);
            }
        }

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
            $dataHistory->setModuleId($this);
        }

        return $this;
    }

    public function removeDataHistory(DataHistory $dataHistory): static
    {
        if ($this->dataHistories->removeElement($dataHistory)) {
            // set the owning side to null (unless already changed)
            if ($dataHistory->getModuleId() === $this) {
                $dataHistory->setModuleId(null);
            }
        }

        return $this;
    }
}
