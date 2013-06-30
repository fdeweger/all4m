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
            SELECT MAX(s.id)
            FROM spot s
            JOIN track t ON s.track_id = t.id
            WHERE t.youtubeid IS NOT NULL');
            $maxId = $res['max'];
        }

        do {
            $next = mt_rand(0, $maxId);
        } while (in_array($next, $previous));


        $res = $rawDb->fetchAssoc('
            SELECT s.track_id, t.youtubeid, t.views, t.flags
            FROM spot s
            JOIN track t ON s.track_id = t.id
            WHERE s.id = ?', array((int) $next));

        if (!$res['youtubeid']) {
            return $this->getNext($previous, $rawDb, $maxId);
        }

        if (10 < $res['flags']  && 0.2 < ($res['flags'] / $res['views'])) {
            return $this->getNext($previous, $rawDb, $maxId);
        }

        return $this->find($res['track_id']);
    }
}