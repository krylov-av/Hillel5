<?php
//phpinfo();
//exit;
//$pdo = new \PDO('mysql:host=localhost;dbname=test',$user,$pass);

abstract class Model
{
    static int $id;
    public static function find(int $id)
    {
        $table = strtolower(static::class);
        $sql = 'SELECT * FROM '.$table.' WHERE id = :id';
        print "Find".$sql;
        //$pdo = null;
        //$stmt = $
        //pdo->prepare($sql);
        //$stmt->execute([':id'=> $id]);
        //$user = $stmt->fetch(\PDO::FETCH_ASSOC);
        //var_dump($user);
    }
    public static function save()
    {
        //create or update
    }
    public static function delete()
    {
        //
    }
}
class User extends Model
{
   private $id;
   // private $name;
   // private $remark;
}

//$User::find(1);
User::find(1);
//$manager1 = new User;
//$manager1->find(5);
//print "<hr>";
//print "<pre>";
//var_dump($manager1);
//print "</pre>";