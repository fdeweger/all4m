<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 7/19/13
 * Time: 7:27 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Commands;

use All4m\Components\Scraper\SpotSaver;
use All4m\Entity\Track;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestSpotSaver extends Command
{
    protected function configure()
    {
        $this->setName('test:spotsaver');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $track = new Track();
        $track->setArtist('A');
        $track->setTitle('A');
        $saver = new SpotSaver();
        $saver->save(array($track), 'TST');
    }

}