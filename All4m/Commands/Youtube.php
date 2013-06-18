<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 6:46 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Commands;

use All4m\Components\ContainerAwareTrait;
use All4m\Components\Scraper\All4mClient;
use All4m\Components\Scraper\YoutubeParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Youtube extends Command
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('youtube')
            ->setDescription('Get youtube id\'s for tracks');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->get('em');
        $parser = new YoutubeParser();
        $tracks = $em->getRepository('\All4m\Entity\Track')->findBy(array("status" => 0));

        foreach ($tracks as $track) {
            $searchTerm = urlencode($track->GetArtist() . " " . $track->GetTitle());
            $url = "https://gdata.youtube.com/feeds/api/videos?v=2&q=" . $searchTerm . "&alt=json";
            $client = new All4mClient($url);
            $response = $client->getData();

            if ($parser->getYouTubeId($track, $response)) {
                $em->persist($track);
                $em->flush();
            }
        }
    }
}