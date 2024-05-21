<?php   
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","vales");
define("DB_PORT",3306);

function abrirBanco(){
    // $con = new mysqli(DB_HOST, DB_USER, DB_PASS , DB_NAME , DB_PORT);
    $con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
    

    if($con->connect_error) {
        die("falha na conexao" . $con->connect_error);
    }
return $con;
}

function fecharBanco($con){
    $con->close();
}

?>
