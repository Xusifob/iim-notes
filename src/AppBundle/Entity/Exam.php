<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exam
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ExamRepository")
 */
class Exam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var array
     *
     * Nous avons plusieurs notes pour un étudiant
     * Une note - Grade - a un champ "student", il faut le préciser via "mappedBy"
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Grade", mappedBy="exam")
     */
    private $grades;

    /**
     * @return array
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * @param array $grades
     */
    public function setGrades($grades)
    {
        $this->grades = $grades;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Exam
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Exam
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}

