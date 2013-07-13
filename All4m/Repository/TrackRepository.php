<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 7:28 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Repository;

use All4m\Components\ContainerAwareTrait;
use Doctrine\ORM\EntityRepository;


class TrackRepository extends EntityRepository
{
    public function getNext(array $previous, $rawDb, $maxId = 0)
    {

        if (!$maxId) {
            $res = $rawDb->fetchAssoc('
            SELECT MAX(s.id) AS max
            FROM Spot s
            JOIN Track t ON s.track_id = t.id
            WHERE t.youtubeid IS NOT NULL');
            $maxId = $res['max'];
        }

        do {
            $next = mt_rand(0, $maxId);
        } while (in_array($next, $previous));


        $res = $rawDb->fetchAssoc('
            SELECT s.track_id, t.youtubeid, t.views, t.flags, t.status
            FROM Spot s
            JOIN Track t ON s.track_id = t.id
            WHERE s.id = ?', array((int) $next));

        if (!$res['youtubeid']) {
            return $this->getNext($previous, $rawDb, $maxId);
        }

        //only preset vevo (aka good) results as the first 3
        //videos.
        if (3 > count($previous) && $res['status'] < 15) {
            return $this->getNext($previous, $rawDb, $maxId);
        }


        if (3 < $res['flags'] || 10 > $res['status']) {
            return $this->getNext($previous, $rawDb, $maxId);
        }

        return $this->find($res['track_id']);
    }
}