<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends BaseCommand
{
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
