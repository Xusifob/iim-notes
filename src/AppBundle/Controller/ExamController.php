<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exam;
use AppBundle\Form\ExamType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ExamController
 * @package AppBundle\Controller
 * @Route("/exam")
 */
class ExamController extends Controller
{
    /**
     * @Route("/", name="exam_list")
     */
    public function indexAction()
    {

        $exams = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Exam')
            ->findAll()
        ;

        // Return the controller
        return $this->render('AppBundle:Exam:index.html.twig',[
            'exams' => $exams
        ]);
    }


    /**
     * @Route("/add", name="exam_add")
     */
    public function addAction(Request $request)
    {
        $exam = new Exam();

        $form = $this->createForm(new ExamType(),$exam);

        if($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()){
            $db = $this->getDoctrine()->getManager();
            $db->persist($exam);
            $db->flush();

            return $this->redirectToRoute('exam_list');
        }

        // Return the controller
        return $this->render('AppBundle:Exam:add.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}",name="exam_delete")
     */
    public function deleteAction($id){

        $db = $this->getDoctrine()->getManager();

        $exam = $db->getRepository('AppBundle:Exam')->find($id);

        $db->remove($exam);
        $db->flush();

        return $this->redirectToRoute('exam_list');
    }
}
