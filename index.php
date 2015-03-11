<?php
namespace index;

require ('./Queue.php');
require ('./Request.php');
require ('./Exception.php');
require ('./Collector.php');

use RollingCurl;

$start = microtime(true);
$collector = new RollingCurl\Collector();
$collector->run(array(
    new RollingCurl\Request('http://www.baidu.com/'),

    new RollingCurl\Request('http://www.haosou.com/'),
    new RollingCurl\Request('http://www.chinaso.com/'),
    new RollingCurl\Request('http://www.taobao.com/'),
    new RollingCurl\Request('http://wwww.tmall.com/'),

    new RollingCurl\Request('http://www.mi.com/'),
    new RollingCurl\Request('http://www.163.com/'),

));
//var_dump($collector->getData());

$mid = microtime(true);

file_get_contents('http://www.baidu.com/');

file_get_contents('http://www.haosou.com/');
file_get_contents('http://www.chinaso.com/');
file_get_contents('http://www.taobao.com/');
file_get_contents('http://wwww.tmall.com/');

file_get_contents('http://www.mi.com/');
file_get_contents('http://www.163.com/');


$end = microtime(true);
echo $mid - $start;
echo '<br />';
echo $end - $mid;