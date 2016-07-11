<?php
/**
 * Conectare la baza de date
 * 
 * @param array $info
 * @return \PDO
 */
function db_connect(array $info)
{
    $info += array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'database' => 'cylex',
        'charset' => 'utf8',
        'user' => 'root',
        'pass' => '',
    );
    
    $dsn = array(
        'host=' . $info['host'],
        'port=' . $info['port'],
        'dbname=' . $info['database'],
        'charset=' . $info['charset'],
    );
    
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_STRINGIFY_FETCHES => false,
        PDO::ATTR_EMULATE_PREPARES => false,
    );
    
    return new PDO('mysql:' . implode(';', $dsn), $info['user'], $info['pass'], $options);
}
/**
 * Executa o comanda SQL
 * 
 * @param PDO $connection
 * @param type $statement
 * @param array $params
 * @return type
 */
function db_command(PDO $connection, $statement, array $params = array())
{
    return $connection->prepare($statement)->execute($params);
}
/**
 * Executa o comanda SQL si returneaza rezultatele
 * 
 * @param PDO $connection
 * @param type $statement
 * @param array $params
 * @return type
 */
function db_select(PDO $connection, $statement, array $params = array())
{
    $stmt = $connection->prepare($statement);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    $stmt->closeCursor();
    return $result;
}
/**
 * Executa o comanda SQL si returneaza numarul de randuri inserate
 * 
 * @param PDO $connection
 * @param type $statement
 * @param array $params
 * @return type
 */
function db_insert(PDO $connection, $statement, array $params = array())
{
    $stmt = $connection->prepare($statement);
    $stmt->execute($params);
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
/**
 * Executa o comanda SQL si returneaza numarul de randuri afectate
 * 
 * @param PDO $connection
 * @param type $statement
 * @param array $params
 * @return type
 */
function db_update(PDO $connection, $statement, array $params = array())
{
    $stmt = $connection->prepare($statement);
    $stmt->execute($params);
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
/**
 * Executa o comanda SQL si returneaza numarul de randuri afectate
 * 
 * @param PDO $connection
 * @param type $statement
 * @param array $params
 * @return type
 */
function db_delete(PDO $connection, $statement, array $params = array())
{
    $stmt = $connection->prepare($statement);
    $stmt->execute($params);
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
/**
 * Returneaza ultimul ID inserat
 * 
 * @param PDO $connection
 * @param string|null $name (optional)
 * @return mixed
 */
function db_last_insert_id(PDO $connection, $name= null)
{
    return $connection->lastInsertId($name);
}