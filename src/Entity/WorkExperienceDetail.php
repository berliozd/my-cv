<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkExperienceDetailRepository")
 */
class WorkExperienceDetail
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
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $technical_environment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\WorkExperience", inversedBy="workExperienceDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workExperience;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getTechnicalEnvironment(): ?string
    {
        return $this->technical_environment;
    }

    public function setTechnicalEnvironment(string $technical_environment): self
    {
        $this->technical_environment = $technical_environment;

        return $this;
    }

    public function getWorkExperience(): ?WorkExperience
    {
        return $this->workExperience;
    }

    public function setWorkExperience(?WorkExperience $workExperience): self
    {
        $this->workExperience = $workExperience;

        return $this;
    }
}
