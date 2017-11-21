 <?php
include("../adodb/adodb.inc.php");
class Conexao{
    function getConexao(){
      $db = NewADOConnection("mysqli");
      $db->connect("localhost","root", "", "revistaonline1");
        return $db;
    }
}
?>
