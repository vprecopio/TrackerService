<?php

trait Database
{
    protected $pdo;
    protected $solo_prepared = true;

    protected function Connect()
    {
        $host = $_ENV["MYSQL_SERVER"];
        $dbName = $_ENV["MYSQL_DATABASE"];
        $dbPort = $_ENV["MYSQL_SERVER_PORT"];
        $username = $_ENV["MYSQL_USER"];
        $password = $_ENV["MYSQL_USER_PASSWORD"];

        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName . ';port=' . $dbPort;

        try {
            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            if ($this->solo_prepared) {
                $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
//se añadio la funcion prepare para poder usarla en los metodos
    protected function prepare($sql)
    {
        if (!$this->pdo) {
            $this->Connect();
        }

        return $this->pdo->prepare($sql);
    }
}
