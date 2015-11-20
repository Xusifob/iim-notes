<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 17/11/15
 * Time: 15:20
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Class APIController
 * @package AppBundle\Controller
 */
class APIController extends FOSRestController
{

    /** Students */
    public function getStudentsAction()
    {

        $students = $this->getDoctrine()->getRepository('AppBundle:Student')->findAll();
        if(!is_array($students)){
            throw $this->createNotFoundException();
        }
        return $students;
    }

    public function getStudentAction($id)
    {
        $students = $this->getDoctrine()->getRepository('AppBundle:Student')->find($id);
        if(!is_object($students)){
            throw $this->createNotFoundException();
        }
        return $students;
    }


    /*** Grades **/
    public function getGradesAction()
    {
        $grades = $this->getDoctrine()->getRepository('AppBundle:Grade')->findAll();
        if(!is_array($grades)){
            throw $this->createNotFoundException();
        }
        return $grades;
    }


    public function getGradeAction($id)
    {
        $grade = $this->getDoctrine()->getRepository('AppBundle:Grade')->find($id);
        if(!is_object($grade)){
            throw $this->createNotFoundException();
        }
        return $grade;
    }


    /** Admins */
    public function getAdminsAction()
    {
        $admins = $this->getDoctrine()->getRepository('AppBundle:Admin')->findAll();
        if(!is_array($admins)){
            throw $this->createNotFoundException();
        }
        return $admins;
    }

    public function getAdminAction($id)
    {
        $admin = $this->getDoctrine()->getRepository('AppBundle:Admin')->find($id);
        if(!is_object($admin)){
            throw $this->createNotFoundException();
        }
        return $admin;
    }


    /** Exams */
    public function getExamsAction()
    {
        $exams = $this->getDoctrine()->getRepository('AppBundle:Exam')->findAll();
        if(!is_array($exams)){
            throw $this->createNotFoundException();
        }
        return $exams;
    }

    public function getExamAction($id)
    {
        $exam = $this->getDoctrine()->getRepository('AppBundle:Exam')->find($id);
        if(!is_object($exam)){
            throw $this->createNotFoundException();
        }
        return $exam;
    }



}