<?php
namespace Helper;
use Doctrine\DBAL\DriverManager;

class Database
{
    static $builder = null;
    static $ptrConnect = null;
    static $config = array(
        'driver' => 'oci8',
        'host' => '192.168.11.170',
        'port'=>1521,
        'password' => 'V44dmM7x',
        'user' => 'dev1',
        'servicename'=>'mpos',
        'dbname' => 'DEV1',
        'charset'=> 'UTF8'
    );
    function __construct() {
        self::$ptrConnect = DriverManager::getConnection(self::$config);
        self::$builder = self::$ptrConnect->createQueryBuilder();
    }
    public static function connect(){
        return self::$ptrConnect;
    }
    public static function builder(){
        return self::$builder;
    }
}
$db = new Database();