<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GradeRepository")
 */
class Grade
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
     * @ORM\Column(name="grade", type="string", length=255)
     */
    private $grade;


    /**
     * @var Exam
     *
     * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Exam", inversedBy="grades")
     */
    private $exam;

    /**
     * @return Exam
     */
    public function getExam()
    {
        return $this->exam;
    }

    /**
     * @param Exam $exam
     * @return $this
     */
    public function setExam($exam)
    {
        $this->exam = $exam;
        return $this;
    }


    /**
     * @var Student
     *
     * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student", inversedBy="grades")
     */
    private $student;

    /**
     * @return Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param Student $student
     * @return $this
     */
    public function setStudent($student)
    {
        $this->student = $student;
        return $this;
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
     * Set grade
     *
     * @param string $grade
     *
     * @return Grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }


    /**
     * @return grade
     */
    function __toString()
    {
     return $this->grade;
    }
}

