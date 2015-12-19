#!/bin/bash
PHP_BIN="php"
WEB_DIR="/web/htdocs"
WEB_HOST="localhost"
WEB_PORT=8888

$PHP_BIN -S ${WEB_HOST}:${WEB_PORT} -t ${WEB_DIR} $(dirname $(readlink -f $0))/phpWSRouter.php
