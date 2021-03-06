<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillsRepository")
 */
class Skills
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillTypes", inversedBy="skills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skill_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSkillType(): ?SkillTypes
    {
        return $this->skill_type;
    }

    public function setSkillType(?SkillTypes $skill_type): self
    {
        $this->skill_type = $skill_type;

        return $this;
    }
}
