<?php

	namespace LeicesterCivicBusHack\MistabusAPIBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;

	/**
	 * Class DefaultController
	 * @package LeicesterCivicBusHack\MistabusAPIBundle\Controller
	 */
	class DefaultController extends Controller {

		/**
		 * Accept a location via a lat and long GET request and return an array of bus stops in the near vicinity
		 * @param Request $request
		 * @return Response
		 */
		public function nearestStopsAction(Request $request) {
			$mistabus_lookup  = $this->get('mistabus_lookup');
			$latitude  = $request->query->get('lat','0');
			$longitude = $request->query->get('lng','0');

			#get locations near these co-ordinates
			$locations = $mistabus_lookup->nearestStops($latitude,$longitude);
			if(!$locations) {
				return new Response(null, 404, array('Content-Type'=>'application/json'));
			}

			return new Response(json_encode($locations), 200, array('Content-Type'=>'application/json'));
		}

		/**
		 * Accept a location code for a bus stop and return an array of available routes served by that stop
		 * @param Request $request
		 * @return Response
		 */
		public function availableRoutesAction(Request $request) {
			$mistabus_lookup = $this->get('mistabus_lookup');
			$location_id = $request->query->get('loc');

			#check the stop exists
			$location = $mistabus_lookup->getStop($location_id);
			if(!$location) {
				return new Response(null, 404, array('Content-Type'=>'application/json'));
			}

			#get routes that serve this location
			$routes = $mistabus_lookup->availableRoutes($location);
			if(!$routes) {
				return new Response(null, 404, array('Content-Type'=>'application/json'));
			}

			return new Response(json_encode($routes), 200, array('Content-Type'=>'application/json'));
		}

		/**
		 * @todo change to POST
		 * Report a delay on a route at a particular location
		 * @param Request $request
		 * @return Response
		 */
		public function postDelayAction(Request $request) {
			$mistabus_lookup = $this->get('mistabus_lookup');
			$mistabus_report = $this->get('mistabus_delay');
			$location_id = $request->query->get('loc',0);

			#double check that the report has valid location and route data
			$location = $mistabus_lookup->getStop($location_id);
			if(!$location) {
				return new Response(null, 404, array('Content-Type'=>'application/json'));
			}

			#post the report
			$delay = $mistabus_report->reportDelay($location);
			return new Response(json_encode($delay), 200, array('Content-Type'=>'application/json'));
		}

		/**
		 * Update a delay on a route
		 * @todo change to POST
		 * @param Request $request
		 * @return Response
		 */
		public function updateDelayAction(Request $request) {
			$mistabus_report = $this->get('mistabus_delay');
			$delay_id   = $request->query->get('del','0');
			$finished = $request->query->get('fin',false);

			#update the report
			$delay = $mistabus_report->getDelay($delay_id);
			if(!$delay) {
				return new Response(null, 404, array('Content-Type'=>'application/json'));
			}

			#post the report
			$delay = $mistabus_report->UpdateDelay($delay,$finished);
			return new Response(json_encode($delay), 200, array('Content-Type'=>'application/json'));
		}

	}
