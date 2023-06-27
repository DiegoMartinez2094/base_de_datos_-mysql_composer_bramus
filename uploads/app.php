<?php
    require "../vendor/autoload.php"; //se trae el autoload desde el vendor creado por composer
    $router = new \Bramus\Router\Router();
    

/**1- Tabla Areas------------------------------------------------------------------------------------------------------------------------------------------------- */

    $router->get("/area", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM areas");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE areas SET name_area = :NAME_AREA WHERE id =:CEDULA");
        $res-> bindValue("NAME_AREA", $_DATA['name_area']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res-> bindValue("CEDULA", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM areas WHERE id =:CEDULA");
        $res->bindValue("CEDULA", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO areas (name_area) VALUES (:NAME_AREA)");
        $res-> bindValue("NAME_AREA", $_DATA['name_area']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    /**-------------------------------------------------------------------------------------------------------------------------------------------------- */
    
    /**2-Tabla countries--------------------------------------------------------------------------------------------------------------------------------------*/
    $router->get("/paises", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM countries");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/paises", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE countries SET name_country = :NAME_COUNTRY WHERE id =:CEDULA");
        $res-> bindValue("NAME_COUNTRY", $_DATA['name_country']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res-> bindValue("CEDULA", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/paises", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM countries WHERE id =:CEDULA");
        $res->bindValue("CEDULA", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/paises", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO countries (name_country) VALUES (:NAME_COUNTRY)");
        $res-> bindValue("NAME_COUNTRY", $_DATA['name_country']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    /**------------------------------------------------------------------------------------------------------------------------------------------------------- */

    /**3-tabla cities------------------------------------------------------------------------------------------------------------------------------------------- */

    $router->get("/cities", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM cities");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/cities", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE cities SET name_city = :NAME_CITY, id_region= :ID_REGION    WHERE id =:CEDULA");
        $res-> bindValue("NAME_CITY", $_DATA['name_city']);
        $res-> bindValue("ID_REGION", $_DATA['id_region']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res-> bindValue("CEDULA", $_DATA['id']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/cities", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM cities WHERE id =:CEDULA");
        $res->bindValue("CEDULA", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/cities", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO cities (name_city, id_region) VALUES (:NAME_CITY,:ID_REGION)");
        $res-> bindValue("NAME_CITY", $_DATA['name_city']);
        $res-> bindValue("ID_REGION", $_DATA['id_region']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
/**---------------------------------------------------------------------------------------------------------------------- */
/**4-tabla emergency_contact----------------------------------------------------------------------------------------------- */
$router->get("/emergencia", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM emergency_contact");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/emergencia", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE emergency_contact SET id_staff = :ID_STAFF,
     cel_number= :CEL_NUMBER, relationship= :RELATIONSHIP, full_name=:FULL_NAME, email=:EMAIL    WHERE id =:CEDULA");
    $res-> bindValue("ID_STAFF", $_DATA['id_staff']);
    $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
    $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
    $res-> bindValue("FULL_NAME", $_DATA['full_name']);
    $res-> bindValue("EMAIL", $_DATA['email']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/emergencia", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM cities WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/emergencia", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO emergency_contact (id_staff, cel_number, relationship, full_name, email) VALUES
     (:ID_STAFF,:CEL_NUMBER, :RELATIONSHIP, :FULL_NAME,:EMAIL)");
    $res-> bindValue("ID_STAFF", $_DATA['id_staff']);
    $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
    $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
    $res-> bindValue("FULL_NAME", $_DATA['full_name']);
    $res-> bindValue("EMAIL", $_DATA['email']);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**-------------------------------------------------------------------------------------------------------------------------------------------- */
/**5- Tabla Journey */
$router->get("/jornada", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM journey");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/jornada", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE journey SET name_journey = :NAME_JOURNEY,
     check_in= :CHECK_IN, check_out= :CHECK_OUT  WHERE id =:CEDULA");
    $res-> bindValue("NAME_JOURNEY", $_DATA['name_journey']);
    $res-> bindValue("CHECK_IN", $_DATA['check_in']);
    $res-> bindValue("CHECK_OUT", $_DATA['check_out']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/jornada", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM journey WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/jornada", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO journey (name_journey, check_in, check_out) VALUES
     (:NAME_JOURNEY,:CHECK_IN, :CHECK_OUT)");
    $res-> bindValue("NAME_JOURNEY", $_DATA['name_journey']);
    $res-> bindValue("CHECK_IN", $_DATA['check_in']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
    $res-> bindValue("CHECK_OUT", $_DATA['check_out']);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**-------------------------------------------------------------------------------------------------------------------------------------------------------- */
/**6- tabla levels-------------------------------------------------------------------------------------------------- */
$router->get("/nivel", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM levels");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/nivel", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE levels SET name_level = :NAME_LEVEL, group_level= :GROUP_LEVEL  WHERE id =:CEDULA");
    $res-> bindValue("NAME_LEVEL", $_DATA['name_level']);
    $res-> bindValue("GROUP_LEVEL", $_DATA['group_level']);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/nivel", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM levels WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/nivel", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO levels (name_level, group_level) VALUES
     (:NAME_LEVEL,:GROUP_LEVEL)");
    $res-> bindValue("NAME_LEVEL", $_DATA['name_level']);
    $res-> bindValue("GROUP_LEVEL", $_DATA['group_level']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->run();
    /*
        Preparar -> 
            - Se llama a la conexion    
        Enviar  ->
        Ejecutar ->
        Esperar ->
    */
?>