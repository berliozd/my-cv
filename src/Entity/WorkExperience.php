<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkExperienceRepository")
 */
class WorkExperience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $context;

    /**
     * @ORM\Column(type="date")
     */
    private $start_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $end_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\WorkExperienceDetail", mappedBy="workExperience", orphanRemoval=true)
     */
    private $workExperienceDetails;

    public function __construct()
    {
        $this->workExperienceDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
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

    /**
     * @return Collection|WorkExperienceDetail[]
     */
    public function getWorkExperienceDetails(): Collection
    {
        return $this->workExperienceDetails;
    }

    public function addWorkExperienceDetail(WorkExperienceDetail $workExperienceDetail): self
    {
        if (!$this->workExperienceDetails->contains($workExperienceDetail)) {
            $this->workExperienceDetails[] = $workExperienceDetail;
            $workExperienceDetail->setWorkExperience($this);
        }

        return $this;
    }

    public function removeWorkExperienceDetail(WorkExperienceDetail $workExperienceDetail): self
    {
        if ($this->workExperienceDetails->contains($workExperienceDetail)) {
            $this->workExperienceDetails->removeElement($workExperienceDetail);
            // set the owning side to null (unless already changed)
            if ($workExperienceDetail->getWorkExperience() === $this) {
                $workExperienceDetail->setWorkExperience(null);
            }
        }

        return $this;
    }
}
