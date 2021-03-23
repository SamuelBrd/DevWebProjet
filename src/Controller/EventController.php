<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Evenement;
use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;

class EventController extends AbstractController
{
    

    /**
    * Lister uniquement les événements qui n'ont pas encore expiré !
    * @Route("/{_locale}/event", name="event.list")
     * @return Response
     */
    public function list(EntityManagerInterface $em) : Response
    {
        $event = $this->getDoctrine()->getRepository(Evenement::class)->getEventNonExpires();
        return $this->render('event/list.html.twig', [
            'event' => $event,
        ]);
    }

    /**
    * Lister tous les événements.
    * @Route("/{_locale}/allevent", name="allevent.list")
    * @return Response
    */
    public function listAll() : Response
    {
        $events = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this->render('stage/list.html.twig', [
        'stages' => $stages,
        ]);
    }

    /**
    * Require ROLE_ADMIN
    * @IsGranted("ROLE_ADMIN")
 	* Créer un nouveau stage.
 	* @Route("/{_locale}/nouveauevent", name="event.create")
 	*/
	public function create(Request $request, UserInterface $user)
	{
 		$event = new Evenement();
 		$form = $this->createForm(EventType::class, $event);
 		$form->handleRequest($request);
 		if ($form->isSubmitted() && $form->isValid()) {
            $commu = $user->getCommuName();
            $event->setTypeEvent($commu);
 			$entityManager = $this->getDoctrine()->getManager();
 			$entityManager->persist($event);
 			$entityManager->flush();
 			return $this->redirectToRoute('homepage');
 		}
 			return $this->render('event/create.html.twig', [
 			'eventForm' => $form->createView(),
 		]);
    }

    /**
    * Require ROLE_ADMIN
    * @IsGranted("ROLE_ADMIN")
    * Éditer un évenement.
    * @Route("/{_locale}/event/{id}/edit", name="event.edit")
    * @param Request $request
    * @param EntityManagerInterface $em
    * @return RedirectResponse|Response
    */
    public function edit(Request $request, Evenement $event, EntityManagerInterface $em) : Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('event.list');
        }
        return $this->render('event/create.html.twig', [
        'eventForm' => $form->createView(),
        ]);
    }

    /**
    * Require ROLE_ADMIN
    * @IsGranted("ROLE_ADMIN")
    * Supprimer un événement.
    * @Route("/{_locale}/event/{id}/delete", name="event.delete")
    * @param Request $request
    * @param Event $event
    * @param EntityManagerInterface $em
    * @return Response
    */
    public function delete(Request $request, Evenement $event, EntityManagerInterface $em) : Response
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('event.delete', ['id' => $event->getId()]))
            ->getForm();
        $form->handleRequest($request);
        if ( ! $form->isSubmitted() || ! $form->isValid()) {
            return $this->render('event/delete.html.twig', [
                'event' => $event,
                'form' => $form->createView(),
            ]);
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('event.list');
    }
}
