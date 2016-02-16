<?php

/**
 * 域名跳转前台脚本
 * @author  Yusure
 * @date    2016.2.16
 */

/* 数据库配置 Start */
$config = array(
    'host'   => '127.0.0.1',
    'name'   => 'domain_jump',
    'user'   => 'yusure',
    'pwd'    => 'yukill56',
    'port'   => '3306',
    'prefix' => 'jp_'
);
/* 数据库配置 End */

header("content-type:text/html;charset=utf8");
header("HTTP/1.1 301 Moved Permanently");

$link = mysql_connect( $config['host'].':'.$config['port'], $config['user'], $config['pwd'] );
if ( ! $link ) { die( 'mysql_connect error' ); }
mysql_select_db( $config['name'] );

$domain = strtolower( $_SERVER["HTTP_HOST"] );
$sql = "SELECT jump_domain, end_time FROM {$config['prefix']}domain WHERE domain = '$domain'";
$result = mysql_query( $sql );
$domain_info = mysql_fetch_assoc( $result );
mysql_close( $link );

if ( ! $domain_info ) { die( '解析成功！技术维护Email：czhyusure@163.com' ); }

if ( time() > $domain_info['end_time'] )
{
    die( '域名跳转已过期！技术维护Email：czhyusure@163.com' );
}

header( 'Location: ' . $domain_info['jump_domain'] );

