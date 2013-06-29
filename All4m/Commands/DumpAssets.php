<?php

namespace All4m\Commands;

use All4m\Components\AssetDumper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DumpAssets extends Command
{
    protected function configure()
    {
        $this->setName('dumpassets')
            ->setDescription('Dumps CSS and JS assets');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dumper = new AssetDumper();
        $dumper->dump();
    }
}