<?php

abstract class DbModel
{
    /**
     * @var $pdo PDO
     */
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll()
    {
        $table_name = strtolower(get_class($this));
        return $this->pdo->query("SELECT * FROM ${table_name}")->fetchAll();
    }

    public function save()
    {
        $table_name = strtolower(get_class($this));
        $properties = [];
        $values = [];
        foreach (get_object_vars($this) as $prop => $value) {
            if ($prop !== "pdo") {
                $properties[] ="`${prop}`";
                $values[] = "'${value}'";
            }
        }

        $joinProps = join(",", $properties);
        $joinValues = join(",", $values);
        $query = "INSERT INTO `${table_name}` (${joinProps}) VALUES (${joinValues})";
        $this->pdo->prepare($query)
            ->execute();

    }
}