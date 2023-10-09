<?php

namespace App\Command;

use App\Services\DictionaryService;
use ErrorException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GameCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('calculate')
             ->setDescription('Calculate points based on string provided by user.')
             ->setHelp('This command allows you to calculate points based on the string.')
             ->addArgument('word', InputArgument::REQUIRED, 'Pass the word.');
    }

    /**
     * @throws ErrorException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $response = (new DictionaryService())->checkIfWordExists($input->getArgument('word'));

        $output->writeln($response);

        return Command::SUCCESS;
    }
}