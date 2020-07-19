<?
echo "Connect to Postgres<hr>";
#$dbh = new PDO('pgsql:user=admin dbname=qqq password=pg-secret');
$dbh = new PDO("pgsql:dbname=qqq;host=db-postgres", 'admin', 'admin');

$sql = 'SELECT * FROM "products"';
foreach ($dbh->query($sql) as $row) {
    print $row['id'] . "\t";
    print $row['name'] . "<br>";
}