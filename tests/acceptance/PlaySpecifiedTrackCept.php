<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure the homepage works.');
$I->amOnPage('/play/1');
$I->seeElement('div#video');
$I->see('var selectedTrack = 1');
