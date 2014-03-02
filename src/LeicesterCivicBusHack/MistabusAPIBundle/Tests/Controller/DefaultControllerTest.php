<?php

	namespace LeicesterCivicBusHack\MistabusAPIBundle\Tests\Controller;

	use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

	class DefaultControllerTest extends WebTestCase {
		public function testExactLocationLookupSuccess() {
			$client = static::createClient();
			$client->request(
			             'GET',
			             '/api/0.1/location.json',
			             array(),
			             array(),
			             array('CONTENT_TYPE' => 'application/json'),
			             '{"longitude":"-0.94518","latitude":"52.76451"}'
			);
			echo($client->getResponse());

		}

		public function testNearbyLocationLookupSuccess() {
//			$client = static::createClient();
//			$client->request(
//			             'GET',
//			             '/api/0.1/location.json',
//			             array(),
//			             array(),
//			             array('CONTENT_TYPE' => 'application/json'),
//			             '{"longitude":"-1.132847","latitude":"52.653684"}'
//			);
		}

		public function testLocationLookupFail() {
		}

		public function testRouteLookupSuccess() {

		}

		public function testRouteLookupFail() {

		}
	}
