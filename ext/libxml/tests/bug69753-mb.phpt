--TEST--
Bug #69753 - libXMLError::file contains invalid URI
--XFAIL--
Awaiting upstream fix: https://bugzilla.gnome.org/show_bug.cgi?id=750365
--SKIPIF--
<?php
if (substr(PHP_OS, 0, 3) != 'WIN') die("skip this test is for Windows platforms only");
if (!extension_loaded('dom')) die('skip dom extension not available');
?>
--FILE--
<?php
libxml_use_internal_errors(true);
$doc = new DomDocument();
$doc->load(__DIR__ . DIRECTORY_SEPARATOR . 'bug69753私はガラスを食べられます.xml');
$error = libxml_get_last_error();
var_dump($error->file);
?>
--EXPECTF--
string(%d) "file:///%s/ext/libxml/tests/bug69753.xml"
