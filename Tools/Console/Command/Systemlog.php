<?php
namespace Swadeshswain\Tools\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\ObjectManagerInterface;
class Systemlog extends Command
{
    protected $_objectManager;

    public function __construct(ObjectManagerInterface $objectManager){
        $this->_objectManager = $objectManager;
		 parent::__construct();
    }
    protected function configure()
    {
        $this->setName('clear:systemlog')->setDescription('Clear system Log file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $question = $this->_objectManager->create('\Symfony\Component\Console\Question\ConfirmationQuestion', ['question'=>'your question', 'default' => FALSE]);
        echo $ans = $helper->ask($input, $output, $question);
        if ($ans == 'yes') {
           $output->writeln('Hello World!');
        }else{
            $output->writeln('Noooooooo');
        }
        $output->writeln('Done!');
    }

}