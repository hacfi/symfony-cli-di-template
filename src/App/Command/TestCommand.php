<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TestCommand extends BaseCommand implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container A ContainerInterface instance
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function configure()
    {
        $this
            ->setName('app:test')
            ->setDescription('Test command')
            ->addArgument('arg1', InputArgument::REQUIRED, 'Argument #1')
            ->addArgument('arg2', InputArgument::OPTIONAL, 'Argument #2', 'opt')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('['.date('Y-m-d H:i:s').'] Starting %s', $this->container->getParameter('app.name')));

        if (rand(0, 4) === 4) {
            $output->writeln('['.date('Y-m-d H:i:s').'] <error>error</error>');

            return 1;
        }

        $arg1 = $input->getArgument('arg1');
        $arg2 = $input->getArgument('arg2');

        $output->writeln(sprintf('[%s] <info>Test works...arg1 is "%s" and arg2 is "%s".</info>', date('Y-m-d H:i:s'), $arg1, $arg2));

        return 0;
    }
}
