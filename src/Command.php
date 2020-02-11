<?php

declare(strict_types=1);

namespace Budgegeria\RstBuild;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    /**
     * @var Creator
     */
    private $creator;

    public function __construct(Creator $creator)
    {
        parent::__construct('create');
        $this->creator = $creator;
    }

    protected function configure()
    {
        $this->setDescription('Creates documentation of rst files')
            ->addArgument('path');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = (string) $input->getArgument('path');
        $output->writeln(sprintf('<info>Create Docs for path %s</info>', $path));

        $this->creator->create(sprintf('%s/../%s', __DIR__, $path));

        return 0;
    }
}