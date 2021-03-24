<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\SearchEventType;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
* @Route("/{_locale}")
*/
class SearchController extends AbstractController
{

    /**
     * @Route("/search", name="search_event")
     */
    public function searchEvent(Request $request, EvenementRepository $eventRepository)
    {
    	$event = [];
    	$form = $this->createForm(SearchEventType::class);
    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()) {
    		$criteria = $form->getData();
    		$event = $eventRepository->searchEvent($criteria);
    	}
    	return $this->render('search/event.html.twig', [
    		'event' => $event,
          	'form' => $form->createView(),
    	]);
    }
}
