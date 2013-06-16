<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 12:56 PM
 * To change this template use File | Settings | File Templates.
 */

require_once "All4m/bootstrap.php";

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));