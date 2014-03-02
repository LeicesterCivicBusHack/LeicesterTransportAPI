<?php

	namespace LeicesterCivicBusHack\APIBundle\Controller;

	use LeicesterCivicBusHack\APIBundle\Entity\Report;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;

	class DefaultController extends Controller {
		public function reportAction(Request $request) {
			$atcocode  = $request->query->get('atcocode', 0);
			$company   = $request->query->get('company', '');
			$route     = $request->query->get('route', '');

			$return = array();

			$report = new Report();
			$report->setAtcocode($atcocode);
			$report->setCompany($company);
			$report->setRoute($route);
			$report->setStarttime(new \DateTime());

			#@todo check valid company,route,atcocode

			$em = $this->getDoctrine()->getManager();
			$em->persist($report);
			$em->flush();

			$return['id'] = $report->getId();


			$response = new Response(json_encode($return), 200, array('Content-Type'=>'application/json'));
			return $response;
		}


		public function updateAction(Request $request) {
			$id  = $request->query->get('id', 0);
			$end = $request->query->get('end', 0);



			#@todo check valid id, end time

			$em     = $this->getDoctrine()->getManager();
			/**
			 * @var $report Report
			 */
			$report = $em->getRepository('LeicesterCivicBusHack:Report')
			             ->findOneBy(['id' => $id]);

			$return = array();

			if(!$report) {
				$return['status'] = 'Could not find report id';
				$response = new Response(json_encode($return), 404, array('Content-Type'=>'application/json'));
				return $response->send();
			}

			$report->setEndtime($end);
			$em->persist($end);
			$em->flush();

			$return['status'] = 'Report updated';
			$response = new Response(json_encode($return), 200, array('Content-Type'=>'application/json'));
			return $response->send();


		}
	}
