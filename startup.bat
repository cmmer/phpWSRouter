@echo off

set PHP_BIN=d:\dev\server\php-5.6.6-nts-Win32-VC11-x86\php
set WEB_DIR=D:\dev\web\windwork.org
set WEB_PORT=8888

%PHP_BIN% -S localhost:%WEB_PORT% -t %WEB_DIR% %~dp0%phpWSRouter.php
