<?php

namespace All4m\Commands;

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
        $cachebust = new \DateTime();
        $cachebust = $cachebust->format('U');

        $jsdir = __DIR__ . '/../../resources/js/';

        $js = new \Assetic\Asset\AssetCollection(array(
            new \Assetic\Asset\FileAsset($jsdir . 'all4m.js', array(new \Assetic\Filter\JSMinFilter())),
            new \Assetic\Asset\FileAsset($jsdir . 'retina.js'),
            new \Assetic\Asset\GlobAsset($jsdir . 'bootstrap/*', array(new \Assetic\Filter\JSMinFilter()))
        ));
        $js = $js->dump();

        file_put_contents(__DIR__ . '/../../public/js/all4m-' . $cachebust . '.js', $js);

        $css = new \Assetic\Asset\GlobAsset(__DIR__ . '/../../resources/css/*', array(new \Assetic\Filter\CssMinFilter()));
        $css = $css->dump();

        file_put_contents(__DIR__ . '/../../public/css/all4m-' . $cachebust . '.css', $css);
    }
}