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

			$delays = $this->getDoctrine()->getRepository('LeicesterCivicBusHackMistabusAPIBundle:Delay')->findBy(['endtime'=>null]);



			return $this->render('LeicesterCivicBusHackMistabusWebBundle:Default:index.html.twig',['delays'=>$delays]);
		}
	}
