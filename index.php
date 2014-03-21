<?php header('Content-type: text/plain');

require 'src/ValidUTF8XMLFilter.php';

$doc = simplexml_load_file("php://filter/read=xmlutf8/resource=data/fmpxmlresult2.xml");

print_r($doc);