<?php

	namespace LeicesterCivicBusHack\MistabusAPIBundle\Command;

	use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;

	class GenerateRandomDataCommand extends ContainerAwareCommand {

		protected function configure() {
			$this
				->setName('app:random')
				->setDescription('Generates Random Data');
		}


		/**
		 * @param InputInterface  $input
		 * @param OutputInterface $output
		 * @return int|null|void
		 */
		protected function execute(InputInterface $input, OutputInterface $output) {
			#generate random delays in leicester


			$doctrine    = $this->getContainer()->get('doctrine');
			$output->writeln("Complete");
		}
	}