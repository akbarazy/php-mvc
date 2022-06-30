<?php
class Database
{
    // value nya diambil dari const file config.php
    private
        $host = DATABASEHOST,
        $user = DATABASEUSER,
        $password = DATABASEPASS,
        $databaseName = DATABASENAME;

    private
        $databaseHandler,
        $statement;

    public function __construct()
    {
        $dataSourceName = "mysql:host={$this->host};dbname={$this->databaseName}";
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {

            $this->databaseHandler = new PDO($dataSourceName, $this->user, $this->password, $option);
        } catch (PDOException $error) {

            die($error->getMessage());
        }
    }

    // untuk query ke database nya
    public function query($query)
    {
        $this->statement = $this->databaseHandler->prepare($query);
    }

    public function bind($parameter, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {

                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($parameter, $value, $type);
    }

    // untuk menjalankan hasil query nya
    public function execute()
    {
        $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}
