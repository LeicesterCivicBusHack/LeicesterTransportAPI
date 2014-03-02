<?php

	namespace LeicesterCivicBusHack\MistabusWebBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Response;

	class DefaultController extends Controller {

		/**
		 * Return the default home page for the front end website
		 * @return Response
		 */
		public function indexAction() {
			return $this->render('LeicesterCivicBusHackMistabusWebBundle:Default:index.html.twig');
		}
	}
