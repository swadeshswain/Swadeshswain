<?php
namespace Swadeshswain\Tools\Console\Command;

use Symfony\Component\Console\Command\Command; // for parent class
use Symfony\Component\Console\Input\InputInterface; // for InputInterface used in execute method
use Symfony\Component\Console\Output\OutputInterface; // for OutputInterface used in execute method
use Symfony\Component\Filesystem\Filesystem;

class Swadeshlist extends Command
{
    protected function configure()
    {
        $this->setName('swadesh:list')
             ->setDescription('Display all custom cli command');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      
        try {
        $output->writeln(" ");
        $output->writeln("<info>Available Custom Commands:</info>");
		$output->writeln(" ");
        $output->writeln("  swadesh:allsetup                        <comment>Run command : setup:upgrade,setup:di:compile,setup:static-content:deploy,indexer:reindex,cache:clean,cache:flush</comment>");
		 $output->writeln(" ");
		$output->writeln("  clear:report                            <comment>Clear all report file Var/report</comment>");
		$output->writeln(" ");
		$output->writeln("  clear:generation                        <comment>Clear all generation file Var/generation</comment>");
     //   $output->writeln("<error>This is an error message.</error>");
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while display all cli list directory at ".$e->getPath();
        }
    }
}