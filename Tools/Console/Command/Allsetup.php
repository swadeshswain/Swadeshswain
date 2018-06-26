<?php
namespace Swadeshswain\Tools\Console\Command;
use Symfony\Component\Console\Command\Command; // for parent class
use Symfony\Component\Console\Input\InputInterface; // for InputInterface used in execute method
use Symfony\Component\Console\Output\OutputInterface; // for OutputInterface used in execute method
use Symfony\Component\Filesystem\Filesystem;
class Allsetup extends Command
{
    protected function configure()
    {
        $this->setName('swadesh:allsetup')
             ->setDescription('Setup Upgrade/static-content/cache/ command!');

        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {      
        try {
        $commandList = array('setup:upgrade','setup:di:compile','setup:static-content:deploy','indexer:reindex','cache:clean','cache:flush');
        foreach ($commandList as $list) {
        $command = $this->getApplication()->find($list);
        $returnCode = $command->run($input, $output);
        if(!$returnCode) $output->writeln($list . ' successfully finished');
        }
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while excuting command ".$e->getPath();
        }
    }
}