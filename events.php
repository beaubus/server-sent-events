<?php
header('Content-type: text/event-stream');
header('Cache-Control: no-cache');
ob_end_flush();

$message = 'Helloworld!';

foreach (str_split($message) as $letter) {

    echo "event: message\n";
    echo "data: $letter\n\n";

    flush();
    if (connection_aborted()) break;
    sleep(1);
}

echo "event: stop\n";
echo "data: stopped\n\n";