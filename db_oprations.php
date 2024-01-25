use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

// Create a database adapter
$adapter = new Adapter([
    'driver' => 'Pdo_Mysql',
    'database' => 'your_database',
    'username' => 'your_username',
    'password' => 'your_password',
]);

// Example of a SELECT query
$sql = new Sql($adapter);
$select = $sql->select('your_table');
$select->where(['id' => 1]);
$statement = $sql->prepareStatementForSqlObject($select);
$result = $statement->execute();
$data = $result->current();

// Example of an INSERT query
$sql = new Sql($adapter);
$insert = $sql->insert('your_table');
$insert->values(['column1' => 'value1', 'column2' => 'value2']);
$statement = $sql->prepareStatementForSqlObject($insert);
$statement->execute();
