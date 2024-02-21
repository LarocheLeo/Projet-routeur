<?php
$rep=snmpwalk('192.168.1.1', 'public', $_POST['verif']);
    $fruit = array_shift($rep);
    print_r($fruit);
?>