<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Community;
use App\Form\CommuType;
use Doctrine\ORM\EntityManagerInterface;

class CommuController extends AbstractController
{
     /**
     * @Route("/commu", name="commu.list")
     * @return Response
     */
    public function list(): Response
    {
    	$commu = $this->getDoctrine()->getRepository(Community::class)->findAll();

        return $this->render('commu/list.html.twig', [
            'commu' => $commu,
        ]);
    }

    /**
    * Créer une nouvelle communauté.
    * @Route("/nouvelle-commu", name="commu.create")
    * @param Request $request
    * @param EntityManagerInterface $em
    * @return RedirectResponse|Response
    */
    public function create(Request $request, EntityManagerInterface $em) : Response
    {
        $commu = new Community();
        $form = $this->createForm(CommuType::class, $commu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($commu);
            $em->flush();
            return $this->redirectToRoute('commu.list');
        }
        return $this->render('commu/create.html.twig', [
            'CommuForm' => $form->createView(),
        ]);
    }

    
}
