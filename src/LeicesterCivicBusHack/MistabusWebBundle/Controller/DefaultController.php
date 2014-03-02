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


			$now = new \DateTime();
			$now->sub(new \DateInterval('PT1H'));

			$delays = $this->getDoctrine()->getManager()
				->createQuery('
			SELECT d,l from LeicesterCivicBusHackMistabusAPIBundle:Delay d
			JOIN d.location l
			WHERE d.endtime IS NULL
			and d.updatetime > :now
			')
			->setParameters(['now'=>$now])
				->execute();

			return $this->render('LeicesterCivicBusHackMistabusWebBundle:Default:index.html.twig',['delays'=>$delays]);
		}
	}
