<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 6:48 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


use All4m\Components\Scraper\All4mClient;
use All4m\Entity\Track;

class YoutubeParser
{
    public function getYouTubeId(Track $track, $data)
    {
        //\Doctrine\Common\Util\Debug::dump($track);
        $results = json_decode($data);

        if (!isset($results->feed->entry)) {
            return false;
        }

        $artist = explode(" ", strtolower(trim($track->GetArtist())));
        if ("the" == $artist[0]) {
            unset($artist[0]);
        }
        //no spaces in youtube usernames, if no vevo video is found, try to match the artist name against the youtube username
        //usefull for artist like the prodigy who have their own youtube channel but not a vevo channel.
        $artist = join("", $artist);

        //we'll need this to later on filter out lyrics videos.
        //but since lyrics is a commonly used word, we only do so
        //if the word lyrics is not in the canonical name.
        $lyricsInCanonicalName = strpos($track->getCanonicalName(), 'LYRICS');

        //official vevo channels
        $vevo = -1;
        //artist name is in youtube username (author is the youtube terminology for user name
        $artistInAuthor = -1;
        //used if no official vevo or "artistinauthor" clip can be found, get the most viewed clip
        $maxViews = -1;
        $mostViewed = -1;

        for ($i = 0; $i < count($results->feed->entry); $i++) {
            $entry = $results->feed->entry[$i];
            $author = trim(strtolower($entry->author[0]->name->{'$t'}));
            $title = trim(strtolower($entry->title->{'$t'}));

            if (false !== strpos($author, 'karaoke') || false !== strpos($title, 'karaoke')) {
                continue;
            }

            //try to filter out lyrics videos
            if (false === $lyricsInCanonicalName) {
                if (false !== strpos($author, 'lyrics') || false !== strpos($title, 'lyrics')) {
                    continue;
                }
            }

            if ($vevo == -1 && substr($author, -4) == "vevo") {
                $vevo = $i;
            }

            if ($author == "emimusic") {
                $vevo = $i;
            }

            if ($artistInAuthor == -1 && strpos($author, $artist) !== false) {
                $artistInAuthor = $i;
            }

            if (isset($entry->{'yt$statistics'})) {
                if ($entry->{'yt$statistics'}->viewCount > $maxViews) {
                    $maxViews = $entry->{'yt$statistics'}->viewCount;
                    $mostViewed = $i;
                }
            }
        }

        //if a vevo clip is found, assume it is the official clip
        //otherwise try to find a clip with an "author" (= youtube username) which also has the artist in it.
        //if all else fails, take the most viewed clip.
        if ($vevo >= 0) {
            $i = $vevo;
            $status = 15;
        } elseif ($artistInAuthor >= 0) {
            $i = $artistInAuthor;
            $status = 14;
        } elseif ($mostViewed != -1) {
            $i = $mostViewed;
            $status = 10;
        } else {
            return false;
        }

        $youtubeId = $results->feed->entry[$i]->{'media$group'}->{'yt$videoid'}->{'$t'};
        $track->setYoutubeId($youtubeId);
        $track->setStatus($status);
        return true;
    }
}