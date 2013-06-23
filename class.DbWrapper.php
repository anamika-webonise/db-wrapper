<?php
require_once('config/config.php')
class DbWrapper {
	private static $db , $conn , $query;
	 function __construct() {
		
	 }
 
 
	/**
     * @comment Getter Method for instance of DbWrapper class
     * @return object DbWrapper
     */
    public static function getInstance() {
        if (self::$conn === null) {
            try {
                self::$db = new PDO('mysql:host='.HOST_NAME.';dbname='.DB_NAME.'',USERNAME,PASSWORD);
                self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn = new DbWrapper();
            } catch (PDOException $err) {
                echo "Error: " . $err->getMessage();
            }
        }
        return self::$conn;
    }

}