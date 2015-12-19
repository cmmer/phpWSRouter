<?php
/**
 * phpWSRouter
 * 
 * The tool that run php Built-in web server on command line.
 * (do not use in production, php Built-in web server is only suitable for dev.)
 * 
 * useage:
 * /path/to/php -S localhost:8880 -t /web/docs/dir /path/to/phpWSRouter.php
 * 
 * @license     MIT
 * @author      cmm <cmpan@qq.com>
 * @link        http://github.com/windwork/phpWSRouter
 */

// request file path
$file = $_SERVER['DOCUMENT_ROOT'] . $_SERVER["REQUEST_URI"];
$file = preg_replace("/\\?.*/", '', $file);

// exists static file
if (preg_match('/\.(3gp|apk|avi|bmp|css|csv|doc|docx|flac|gif|gz|gzip|htm|html'
    . '|ics|jpe|jpeg|jpg|js|kml|kmz|m4a|mov|mp3|mp4|mpeg|mpg|odp|ods|odt|oga|ogg'
    . '|ogv|pdf|pdf|png|pps|pptx|qt|svg|swf|tar|text|tif|txt|wav|webm|wmv|xls'
    . '|xlsx|xml|xsl|xsdand|zip)/', $_SERVER["REQUEST_URI"]) 
    && is_file($file)) {
    return false;
}

// php file
//$file = str_replace("index.php/", '', $file); // url like: http://yousite.com/index.php/my.req.params
if (is_file($file) && preg_match('/\.php/', $file)) {
    include $file;
} else {
    // file not exists then run "index.php"
    $_SERVER['SCRIPT_FILENAME'] = $_SERVER['DOCUMENT_ROOT'] . '/index.php';
    include $_SERVER['SCRIPT_FILENAME'];
}

return true;
