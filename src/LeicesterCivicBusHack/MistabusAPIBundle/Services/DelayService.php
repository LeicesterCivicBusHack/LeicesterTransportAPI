<?php
	namespace LeicesterCivicBusHack\MistabusAPIBundle\Services;

	use Doctrine\ORM\EntityManager;
	use LeicesterCivicBusHack\MistabusAPIBundle\Entity\Location;
	use LeicesterCivicBusHack\MistabusAPIBundle\Entity\Delay;

	class DelayService {
		private $em;

		public function __construct(EntityManager $entityManager)  {
			$this->em = $entityManager;
		}

		/**
		 * @param $id
		 * @return \LeicesterCivicBusHack\MistabusAPIBundle\Entity\Delay
		 */
		public function getDelay($id) {
			$delay = $this->em
				->getRepository('LeicesterCivicBusHackMistabusAPIBundle:Delay')
				->find($id);
			return $delay;
		}


		/**
		 * @param Location $location
		 * @return Delay
		 */
		public function reportDelay(Location $location) {
			$delay = new Delay();
			$delay->setLocation($location);
			$this->em->persist($delay);
			$this->em->flush();

			return $delay;
		}

		/**
		 * @param Delay $delay
		 * @param        $finished
		 * @return boolean
		 */
		public function updateDelay(Delay $delay,$finished) {

			#if this delay has finished dont persist
			if($delay->getEndtime()) {
				return $delay;
			}

			$delay->setUpdatetime(new \DateTime());
			if($finished) {
				$delay->setEndtime(new \DateTime());
			}
			$this->em->persist($delay);
			$this->em->flush();

			return $delay;

		}

	}