<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure the homepage works.');
$I->amOnPage('/');
$I->seeElement('div#video');
$I->see('var selectedTrack = 0');
