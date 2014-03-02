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
		 * @param $latitude
		 * @param $longitude
		 * @return ArrayCollection|\LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location[]
		 */
		public function nearestStops($latitude, $longitude) {

			$sql = <<<QUERY
SELECT l, GEO_DISTANCE(l.latitude, l.longitude, :lat, :lng) as distance
FROM LeicesterCivicBusHackMistabusAPIBundle:Location l
ORDER BY distance ASC
QUERY;

			$locations = $this->em
				->createQuery($sql)
				->setParameters([
					'lng'=> $longitude,
					'lat'=> $latitude,
					//'radius'=> $radius
				])
				->setMaxResults(25)
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