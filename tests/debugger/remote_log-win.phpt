--TEST--
Test for Xdebug's remote log (Windows)
--SKIPIF--
<?php
require __DIR__ . '/../utils.inc';
check_reqs('dbgp; win');
?>
--ENV--
I_LIKE_COOKIES=doesnotexist3
--INI--
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.remote_log=C:\Windows\Temp\remote-log4.txt
xdebug.remote_connect_back=1
xdebug.remote_host=doesnotexist2
xdebug.remote_port=9003
xdebug.remote_addr_header=I_LIKE_COOKIES
--FILE--
<?php
echo strlen("foo"), "\n";
echo file_get_contents("C:\\Windows\\Temp\\remote-log4.txt");
unlink ("C:\\Windows\\Temp\\remote-log4.txt");
?>
--EXPECTF--
3
[%d] Log opened at %d-%d-%d %d:%d:%d
[%d] I: Checking remote connect back address.
[%d] I: Checking user configured header 'I_LIKE_COOKIES'.
[%d] I: Remote address found, connecting to doesnotexist3:9003.
[%d] W: Creating socket for 'doesnotexist3:9003', getaddrinfo: %d.
[%d] E: Could not connect to client. :-(
[%d] Log closed at %d-%d-%d %d:%d:%d
