<?php

include "loader.php";


$aMember = new Member("fred", "Chicago", "http://example.com/");
echo $aMember->getUsername() . " lives in " . $aMember->getLocation() . "<br>";
$aMember->save();
$aTopic = new Topic("Teddy Bears are Great", $aMember);
$aTopic->showHeader();
$aTopic->save();