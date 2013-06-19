<?php
$I = new ApiGuy($scenario);
$I->wantTo('get the next track');
$I->sendGET('next');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeKeyExists("id");
$I->seeKeyExists("artist");
$I->seeKeyExists("title");
$I->seeKeyExists("youtubeId");