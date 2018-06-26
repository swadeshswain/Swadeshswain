<?php
namespace Swadeshswain\Tools\Console\Command;

use Symfony\Component\Console\Command\Command; // for parent class
use Symfony\Component\Console\Input\InputInterface; // for InputInterface used in execute method
use Symfony\Component\Console\Output\OutputInterface; // for OutputInterface used in execute method
use Symfony\Component\Filesystem\Filesystem;

class Report extends Command
{
    protected function configure()
    {
        $this->setName('clear:report')
             ->setDescription('Clear var/report folder!');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = glob('var/report/*'); 
		$fs = new Filesystem();
        try {
            if($fs->exists('var/report')){
               foreach($files as $file){ // iterate files
               if(is_file($file))
                unlink($file); // delete file
                   }
                $output->writeln('Cleared report!');
            }
            else {
             $output->writeln('Can\'t find directory');
            }
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while deleting your directory at ".$e->getPath();
        }
    }
}