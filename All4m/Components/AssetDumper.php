<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/29/13
 * Time: 9:24 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components;


class AssetDumper 
{
    public function Dump($debug = false)
    {
        $cacheBust = new \DateTime();
        $cacheBust = $cacheBust->format('U');

        $jsDir = __DIR__ . '/../../resources/js/';

        $jsMin = array();
        if (!$debug) {
            $jsMin = array(new \Assetic\Filter\JSMinFilter());
        }

        $js = new \Assetic\Asset\AssetCollection(array(
            new \Assetic\Asset\FileAsset($jsDir . 'all4m.js', $jsMin),
            new \Assetic\Asset\FileAsset($jsDir . 'retina.js'),
        ));
        $js = $js->dump();

        file_put_contents(__DIR__ . '/../../public/js/all4m-' . $cacheBust . '.js', $js);

        $cssMin = array();
        if (!$debug) {
            $cssMin = array(new \Assetic\Filter\CssMinFilter());
        }

        $css = new \Assetic\Asset\GlobAsset(__DIR__ . '/../../resources/css/*', $cssMin);
        $css = $css->dump();

        file_put_contents(__DIR__ . '/../../public/css/all4m-' . $cacheBust . '.css', $css);
        file_put_contents(__DIR__ . '/../../config/cachebust', $cacheBust);
    }
}