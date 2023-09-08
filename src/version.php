<?php

$db = new SQLite3('FlashCardsDB.db');

$version = $db->querySingle('SELECT SQLITE_VERSION()');

echo $version . "\n";
?>