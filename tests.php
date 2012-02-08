<?php
require_once 'plugin.php';

function yourls_add_filter($a, $b) { }

$fixture = array();
$fixture[] = array('127.0.0.1' => '127.0.0.0');
$fixture[] = array('192.0.43.10' => '192.0.43.0');  // example.com
$fixture[] = array('::1' => '::0');
$fixture[] = array('::ffff:127.0.0.1' => '::ffff:127.0.0.0');
$fixture[] = array('::ffff:192.0.43.10' => '::ffff:192.0.43.0');
$fixture[] = array('2001:0db8:85a3:0000:0000:8a2e:0370:7334' => '2001:0db8:85a3:0000:0000:8a2e:0370:0');


$success = TRUE;
echo "Running tests...\n";

for ($i = 0; $i <= count($fixture)-1; $i++) {
    foreach ($fixture[$i] as $actual => $expected) {
        $success &= assertEquals($expected, ubicoo_pseudonymize_IP( $actual ), $actual);
    }
}

echo "Tests " . ($success ? "succeeded" : "failed") .".\n";


function assertEquals($expected, $actualAfter, $actualBefore)
{
    echo " Checking $actualBefore => $expected ? ... ";
    if ($actualAfter !== $expected) {
        echo "FAILED - was $actualAfter\n";
        return FALSE;
    }
    echo "OK\n";
    return TRUE;
}
