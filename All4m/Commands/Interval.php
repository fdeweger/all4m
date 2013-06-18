<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 1:30 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Commands;

use All4m\Components\Scraper\ScraperFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Interval extends Command
{
    protected function configure()
    {
        $this->setName('scrape:interval')
            ->setDescription('Runs every minute');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $factory = new ScraperFactory();
        $scrapers = array();
        $scrapers[] = $factory->getThreeFmScraper();
        $scrapers[] = $factory->GetFive38Scraper();

        foreach ($scrapers as $scraper) {
            $scraper->scrape();
        }
    }
}