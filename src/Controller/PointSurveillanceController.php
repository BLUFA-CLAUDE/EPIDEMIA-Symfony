<?php

namespace App\Controller;

use App\Entity\PointSurveillance;
use App\Form\PointSurveillanceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PointSurveillanceController extends AbstractController
{
    /**
     * @Route("/point_surveillance/liste", name="liste_surveillance")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $ps = new PointSurveillance();
        $form = $this->createForm(PointSurveillanceType::class, $ps, array('action' => $this->generateUrl('add_ps')));
        $data['form']= $form->createView();
        $data['pointsurveillances'] = $em->getRepository(PointSurveillance::class)->findAll();
        return $this->render('point_surveillance/liste.html.twig',$data);
    }

    /**
     * @Route("/point_surveillance/add", name="add_ps")
     */
    public function add(Request $request): Response
    {
        $ps = new PointSurveillance();

        $form = $this->createForm(PointSurveillanceType::class, $ps);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $ps = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($ps);
            $em->flush();
        }
        return $this->redirectToRoute('liste_surveillance');
    }

    /**
     * @Route("/point_surveillance/get/{id}", name="get_ps")
     */
    public function getPs($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $z = $em->getRepository(PointSurveillance::class)->find($id);

        $form = $this->createForm(PointSurveillanceType::class, $z, array('action' => $this->generateUrl('update_ps',  ['id' => $id])));
        $data['form']= $form->createView();
        $data['pointsurveillances'] = $em->getRepository(PointSurveillance::class)->findAll();
        return $this->render('point_surveillance/liste.html.twig', $data);
    }

    /**
     * @Route("/point_surveillance/update/{id}", name="update_ps")
     */
    public function update($id, Request $request): Response
    {
        $ps = new PointSurveillance();

        $form = $this->createForm(PointSurveillanceType::class, $ps);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $ps = $form->getData();
            $ps->setId($id);
            $em = $this->getDoctrine()->getManager();
            $pointsu = $em->getRepository(PointSurveillance::class)->find($id);
            $pointsu->setCode($ps->getCode());
            $pointsu->setCordonnes($ps->getCordonnes());
            $pointsu->setZone($ps->getZone());
            $em->flush();
        }
        return $this->redirectToRoute('liste_surveillance');
    }

    /**
     * @Route("/point_surveillance/delete/{id}", name="delete_ps")
     */
    public function delete($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $ps = $em->getRepository(PointSurveillance::class)->find($id);

        if($ps !=null){
            $em->remove($ps);
            $em->flush();
        }
        return $this->redirectToRoute('liste_surveillance');
    }
}
