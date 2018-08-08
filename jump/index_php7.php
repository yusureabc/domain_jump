<?php
header("content-type:text/html;charset=utf8");

/**
 * 域名跳转脚本  php7
 *  
 * @author  Sure Yu
 * @date    2018.8.8
 */

define( 'CONTACT', '技术维护Email：czhyusure@163.com' );
/* 数据库配置 Start */
$config = [
    'host'   => '127.0.0.1',
    'name'   => 'domain_jump',
    'user'   => 'yusure',
    'pwd'    => 'yukill56',
    'port'   => '3306',
    'prefix' => 'jp_'
];
/* 数据库配置 End */

$domain = strtolower( $_SERVER["HTTP_HOST"] );
$jump_domain = $end_time = '';

try 
{
    $pdo = "mysql:host={$config['host']};dbname={$config['name']}";
    $dbh = new PDO( $pdo, $config['user'], $config['pwd']);
    $sql = "SELECT jump_domain, end_time FROM {$config['prefix']}domain WHERE domain = '$domain'";
    foreach ( $dbh->query( $sql ) as $row )
    {
        $jump_domain = $row['jump_domain'];
        $end_time = $row['end_time'];
    }
    $dbh = null;
}
catch ( PDOException $e )
{
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if ( empty( $jump_domain ) )
{
    die( '域名解析成功，请在后台添加跳转域名！' . CONTACT );
}
else if ( time() > $end_time )
{
    die( '域名跳转已过期！' . CONTACT );
}

header( "HTTP/1.1 301 Moved Permanently" );
header( 'Location: ' . $jump_domain );