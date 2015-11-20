<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StudentController
 * @package AppBundle\Controller
 * @Route("/student")
 */
class StudentController extends Controller
{
    /**
     * @Route("/", name="student_list")
     */
    public function indexAction()
    {

        $students = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Student')
            ->findAll()
        ;

        // Return the controller
        return $this->render('AppBundle:Student:index.html.twig',[
            'students' => $students
        ]);
    }


    /**
     * @Route("/add", name="student_add")
     */
    public function addAction(Request $request)
    {
        $student = new Student();

        $form = $this->createForm(new StudentType(),$student);

        if($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()){
            $db = $this->getDoctrine()->getManager();
            $db->persist($student);
            $db->flush();

            return $this->redirectToRoute('student_list');
        }

        // Return the controller
        return $this->render('AppBundle:Student:add.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}",name="student_delete")
     */
    public function deleteAction($id){

        $db = $this->getDoctrine()->getManager();

        $student = $db->getRepository('AppBundle:Student')->find($id);

        $db->remove($student);
        $db->flush();

        return $this->redirectToRoute('student_list');
    }
}
