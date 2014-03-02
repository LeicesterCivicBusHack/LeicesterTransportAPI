<?php
	namespace LeicesterCivicBusHack\MistabusAPIBundle\Services;

	use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\EntityManager;
	use LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location;

	class LookupService {
		private $em;

		public function __construct(EntityManager $entityManager) {
			$this->em = $entityManager;
		}

		/**
		 * @todo Calculate "Great Circle" Distance with Doctrine - good luck
		 *       In the meantime i'll use good old Pythagoras and assume each degree of long/lat is approx 69 miles/111 km
		 * @param $latitude
		 * @param $longitude
		 * @param $radius
		 * @return ArrayCollection|\LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location[]
		 */
		public function nearestStops($latitude, $longitude, $radius = 5) {

			#convert radius from km into degrees (approx)
			$radius = $radius / 111;

			$locations = $this->em
			->createQuery('
			SELECT l from LeicesterCivicBusHackMistabusAPIBundle:Location l WHERE
			(
				SQRT((:lng - l.longitude) * (:lng - l.longitude)) +	SQRT((:lat - l.latitude) * (:lat - l.latitude))
			) <= :radius


			')
			->setParameters([
					'lng'=>$longitude,
			        'lat'=>$latitude,
			        'radius'=>$radius
			                ])
				->execute();
			return $locations;
		}

		/**
		 * @param $id
		 * @return \LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location
		 */
		public function getStop($id) {
			$location = $this->em
				->getRepository('LeicesterCivicBusHackMistabusAPIBundle:Location')
				->find($id);
			return $location;
		}


		/**
		 * @todo Parse through TXC data to import into SQL
		 * @param $location Location
		 * @return ArrayCollection|\LeicesterCivicBusHack\MistabusAPIBundle\Entity\Route[]
		 */
		public function availableRoutes(Location $location) {
			return null;
		}

	}