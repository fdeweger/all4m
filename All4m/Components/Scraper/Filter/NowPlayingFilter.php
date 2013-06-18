<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 3:39 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Filter;

use All4m\Components\ContainerAwareTrait;
use All4m\Entity\TrackInterface;


class NowPlayingFilter implements FilterInterface
{
    use ContainerAwareTrait;

    /**
     * @param TrackInterface $track
     * @return bool
     */
    public function filter(TrackInterface $track)
    {
        $em = $this->get('em');
        $current = $em->getRepository('All4m\\Entity\\NowPlaying')->findBy(array(
            "source" => $track->getSource()
        ));

        //first record for this source
        if (!$current) {
            $em->persist($track);
            $em->flush();
            return true;
        }

        $current = $current[0];
        if ($current->getTitle() == $track->getTitle() && $current->getArtist() == $track->getArtist()) {
            return false;
        }

        $em->remove($current);
        //needs explicit flush since the order is non determined and
        //the unique constraint on source might fail otherwise.
        $em->flush();
        $em->persist($track);
        $em->flush();

        return true;
    }

}