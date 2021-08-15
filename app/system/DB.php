<?php

namespace System;

use Exception;
use PDO;

class DB
{
    private static string $connectString;
    private static PDO $pdo;

    public function __construct()
    {
        self::$connectString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';';
        self::$pdo = new PDO(self::$connectString, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
    }

    public static function all($table)
    {
        try {
            if (empty($table)) {
                throw new Exception('Table not specified');
            }

            $sql = 'SELECT * FROM ' . $table;

            return self::$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function create($table, array $data)
    {
        try {
            if (empty($table)) {
                throw new Exception('Table not specified');
            }

            if (empty($data)) {
                throw new Exception('No data');
            }

            $nameColumns = self::getNameColumns($data);
            $numberCharacters = self::getNumberCharacters($data);

            $sql = 'INSERT INTO ' . $table . ' (' . $nameColumns . ') VALUES (' . $numberCharacters . ')';
            $result = self::$pdo->prepare($sql);

            $result->execute(array_values($data));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function delete($table, int $id)
    {
        try {
            if (empty($table)) {
                throw new Exception('Table not specified');
            }

            if (empty($id)) {
                throw new Exception('No id');
            }

            $sql = 'DELETE FROM ' . $table . ' WHERE id = ?';
            $result = self::$pdo->prepare($sql);
            $result->execute([$id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function find($table, int $id)
    {
        try {
            if (empty($table)) {
                throw new Exception('Table not specified');
            }

            if (empty($id)) {
                throw new Exception('No id');
            }

            $sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id;

            return self::$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function update($table, array $data)
    {
        try {
            if (empty($table)) {
                throw new Exception('Table not specified');
            }

            if (empty($data)) {
                throw new Exception('No data');
            }

            $nameColumns = self::getNameColumnsForUpdate($data);

            $sql = 'UPDATE ' . $table . ' SET ' . $nameColumns . ' WHERE id = ?';

            $result = self::$pdo->prepare($sql);
            $result->execute(array_values($data));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function truncate($table)
    {
        try {
            if (empty($table)) {
                throw new Exception('Table not specified');
            }

            $sql = 'TRUNCATE TABLE ' . $table;

            self::$pdo->prepare($sql)->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private static function getNameColumns(array $data)
    {
        return implode(',', array_keys($data));
    }

    private static function getNumberCharacters(array $data)
    {
        return implode(',', array_fill(0, count($data), '?'));
    }

    private static function getNameColumnsForUpdate(array $data)
    {
        $strValues = '';

        foreach ($data as $key => $value)
        {
            if ($key != 'id') {
                $strValues .= $key . ' = ?,';
            }
        }

        return rtrim($strValues, ',');
    }
}