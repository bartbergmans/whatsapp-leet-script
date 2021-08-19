<?php

$handle = fopen("_chat.txt", "r") or die("Unable to open text");

$leet = [];

while(!feof($handle)) {
    $line = fgets($handle);
    if(substr($line, 12, 5) == '13:37') {
        $parts = explode(':', $line);
        $message = trim($parts[3]);
        if($message == '1337' || $message == '13:37') {
            $name = substr($line, 22);
            $name = explode(':', $name);
            $name = $name[0];

            $name = str_replace("“Ongeloofelijke Lul” ", "", $name);

            $date = substr($line, 0, 10);
            if(!isset($leet[$name])) {
                $leet[$name] = [];
            }
            if(!in_array($date, $leet[$name])) {
                $leet[$name][] = $date;
            }
        }
    }
}

fclose($handle);

$ranking = [];
foreach ($leet as $person => $dates) {
    $ranking[$person] = count($dates);
}

arsort($ranking);
echo '*Tussenstand*'.PHP_EOL;
foreach ($ranking as $person => $count) {
    echo sprintf('%s: %d', $person, $count) . PHP_EOL;
}