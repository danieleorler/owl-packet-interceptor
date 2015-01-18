<?php

class Storage
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new PDO('mysql:dbname=owl_monitor;host=localhost', 'owl_user', 'an own stares flabbergast', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    }

    public function log($value)
    {
        $sql = 'INSERT INTO electricity(system_id,watts) VALUES(1,:watts)';
        $sth = $this->dbConnection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(':watts' => intval($value)));
        $sth->closeCursor();
    }
}