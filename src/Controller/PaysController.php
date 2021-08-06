<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    /**
     * @Route("/Pays/liste", name="liste_pays")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $p = new Pays();
        $form = $this->createForm(PaysType::class, $p, array('action' => $this->generateUrl('add_pays')));
        $data['form']= $form->createView();
        $data['pays'] = $em->getRepository(Pays::class)->findAll();
        return $this->render('pays/liste.html.twig', $data);
    }

    /**
     * @Route("/Pays/add", name="add_pays")
     */
    public function add(Request $request): Response
    {
        $p = new Pays;

        $form = $this->createForm(PaysType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $p = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
        }
        return $this->redirectToRoute('liste_pays');
    }

    /**
     * @Route("/Pays/get/{id}", name="get_pays")
     */
    public function getPays($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Pays::class)->find($id);

        $form = $this->createForm(PaysType::class, $p, array('action' => $this->generateUrl('update_pays',  ['id' => $id])));
        $data['form']= $form->createView();
        $data['pays'] = $em->getRepository(Pays::class)->findAll();
        return $this->render('pays/liste.html.twig', $data);
    }

   /**
     * @Route("/Pays/update/{id}", name="update_pays")
     */
    public function update($id, Request $request): Response
    {
        $p = new Pays;

        $form = $this->createForm(PaysType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $p = $form->getData();
            $p->setId($id);
            $em = $this->getDoctrine()->getManager();
            $pays = $em->getRepository(Pays::class)->find($id);
            $pays->setNom($p->getNom());
            $em->flush();
        }
        return $this->redirectToRoute('liste_pays');
    }

    /**
     * @Route("/Pays/delete/{id}", name="delete_pays")
     */
    public function delete($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository(Pays::class)->find($id);
        if($p != null){
            $em->remove($p);
            $em->flush();
        }
        return $this->redirectToRoute('liste_pays');
    }
}
