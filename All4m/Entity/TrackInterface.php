<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 2:19 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Entity;


interface TrackInterface 
{
    public function getArtist();
    public function getTitle();
}