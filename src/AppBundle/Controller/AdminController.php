<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Admin;
use AppBundle\Form\AdminType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 * @package AppBundle\Controller
 * @Route("/admin/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_list")
     */
    public function indexAction()
    {

        $admins = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Admin')
            ->findAll()
        ;

        dump($admins);

        // Return the controller
        return $this->render('AppBundle:Admin:index.html.twig',[
            'admins' => $admins
        ]);
    }


    /**
     * @Route("/add", name="admin_add")
     */
    public function addAction(Request $request)
    {
        $admin = new Admin();

        $form = $this->createForm(new AdminType(),$admin);

        if($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()){
            $db = $this->getDoctrine()->getManager();
            $db->persist($admin);
            $db->flush();

            return $this->redirectToRoute('admin_list');
        }

        // Return the controller
        return $this->render('AppBundle:Admin:add.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}",name="admin_delete")
     */
    public function deleteAction($id){

        $db = $this->getDoctrine()->getManager();

        $admin = $db->getRepository('AppBundle:Admin')->find($id);

        $db->remove($admin);
        $db->flush();

        return $this->redirectToRoute('admin_list');
    }
}
