<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=u910050783_Home', 'u910050783_Home', 'z!_zWicb98LL#6&');
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
class db {

    //Configurações de acesso ao banco de dados
    private $host = 'localhost',
            $db = 'u910050783_Home',
            $usuario = 'u910050783_Home',
            $senha = 'z!_zWicb98LL#6&';
    ///////////////////////////////////////////

    private $con;

    function __construct() {
        $this->con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->db);
        if (!$this->con)
            die("Erro ao conectar ao banco de dados");
    }

    public function query($sql) {
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    public function fetch($sql) {
        $res = array();
        $query = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($query)) {
            while($q = mysqli_fetch_assoc($query))
                $res[] = $q;
            return $res;
        } else
            null;
    }

}


?>
