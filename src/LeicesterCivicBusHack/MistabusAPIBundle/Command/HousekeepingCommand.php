<?php

	namespace LeicesterCivicBusHack\MistabusAPIBundle\Command;

	use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;

	class HousekeepingCommand extends ContainerAwareCommand {

		protected function configure() {
			$this
				->setName('app:hosuekeeping')
				->setDescription('Runs housekeeping on the database');
		}


		/**
		 * @todo Close old records and aggregate information for archive
		 * @param InputInterface  $input
		 * @param OutputInterface $output
		 * @return int|null|void
		 */
		protected function execute(InputInterface $input, OutputInterface $output) {


			$output->writeln("Complete");
		}
	}