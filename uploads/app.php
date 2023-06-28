<?php
    require "../vendor/autoload.php"; //se trae el autoload desde el vendor creado por composer
    $router = new \Bramus\Router\Router();
    

/**1- Tabla Areas------------------------------------------------------------------------------------------------------------------------------------------------- */

    $router->get("/ar", function(){
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
        $res = $cox->con->prepare("UPDATE countries SET name_country = :NAME_CONTRY WHERE id =:CEDULA");
        $res-> bindValue("NAME_CONTRY", $_DATA['countries']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
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
     cel_number= :CEL_NUMBER, relationship= :RELATIONSHIP, full_name=:FULL_NAME, email=:EMAIL    WHERE id =:ID");
    $res-> bindValue("ID_STAFF", $_DATA['id_staff']);
    $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
    $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
    $res-> bindValue("FULL_NAME", $_DATA['full_name']);
    $res-> bindValue("EMAIL", $_DATA['email']);
    $res-> bindValue("ID", $_DATA['id']); 
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
    $res = $cox->con->prepare("UPDATE levels SET name_level = :NAME_LEVEL,
     group_level= :GROUP_LEVEL WHERE id =:CEDULA");
    $res-> bindValue("NAME_LEVEL", $_DATA['name_level']);
    $res-> bindValue("GROUP_LEVEL", $_DATA['group_level']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
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

/**------------------------------------------------------------------------------------------------------------------------------------------ */
/**7-tabla locations ------------------------------------------------------------------------------------------------------------------------ */

$router->get("/location", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM locations");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/location", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE locations SET name_location = :NAME_LOCATION WHERE id =:CEDULA");
    $res-> bindValue("NAME_LOCATION", $_DATA['name_location']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/location", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM locations WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/location", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO locations (name_location) VALUES
     (:NAME_LOCATION)");
    $res-> bindValue("NAME_LOCATION", $_DATA['name_location']);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**-------------------------------------------------------------------------------------------------------------------- */
/**8- tabla position---- */

$router->get("/posicion", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM position");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/posicion", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE position SET name_position = :NAME_POSITION, arl = :ARL WHERE id =:CEDULA");
    $res-> bindValue("NAME_POSITION", $_DATA['name_position']);
    $res-> bindValue("ARL", $_DATA['arl']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/posicion", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM position WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/posicion", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO position (name_position, arl) VALUES
     (:NAME_POSITION,:ARL)");
    $res-> bindValue("NAME_POSITION", $_DATA['name_position']);
    $res-> bindValue("ARL", $_DATA['arl']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}

    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**---------------------------------------------------------------------------------------------------- */
/**9- tabla regions */
$router->get("/region", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM regions");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/region", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE regions SET name_region = :NAME_REGION, id_country = :ID_COUNTRY WHERE id =:CEDULA");
    $res-> bindValue("NAME_REGION", $_DATA['name_region']);
    $res-> bindValue("ID_COUNTRY", $_DATA['id_country']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/region", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM regions WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/region", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO regions (name_region, id_country) VALUES
     (:NAME_REGION,:ID_COUNTRY)");
    $res-> bindValue("NAME_REGION", $_DATA['name_region']);
    $res-> bindValue("ID_COUNTRY", $_DATA['id_country']);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**---------------------------------------------------------------------------------------------------------------------------- */
/**10-TABLA personal_ref---------------- */
$router->get("/personal_ref", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM personal_ref");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/personal_ref", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE personal_ref SET full_name = :FULL_NAME,
     cel_number= :CEL_NUMBER,relationship=:RELATIONSHIP,occupation=:OCCUPATION WHERE id =:CEDULA");
    $res-> bindValue("FULL_NAME", $_DATA['full_name']);
    $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
    $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
    $res-> bindValue("OCCUPATION", $_DATA['occupation']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/personal_ref", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM personal_ref WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/personal_ref", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO personal_ref (full_name, cel_number,relationship,occupation) VALUES
     (:FULL_NAME,:CEL_NUMBER,:RELATIONSHIP,:OCCUPATION)");
   $res-> bindValue("FULL_NAME", $_DATA['full_name']);
   $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
   $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
   $res-> bindValue("OCCUPATION", $_DATA['occupation']);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**------------------------------------------- */

$router->get("/casas", function(){
    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM casas");
    $res -> execute();
    $res = $res->fetchAll(\PDO::FETCH_ASSOC);
     // retorna la consulta como un array asociativo 
    echo json_encode($res);
});

$router->put("/personal_ref", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE personal_ref SET full_name = :FULL_NAME,
     cel_number= :CEL_NUMBER,relationship=:RELATIONSHIP,occupation=:OCCUPATION WHERE id =:CEDULA");
    $res-> bindValue("FULL_NAME", $_DATA['full_name']);
    $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
    $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
    $res-> bindValue("OCCUPATION", $_DATA['occupation']);
    $res-> bindValue("CEDULA", $_DATA['id']); 
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router -> delete("/personal_ref", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM personal_ref WHERE id =:CEDULA");
    $res->bindValue("CEDULA", $_DATA["id"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->post("/casas", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO casas (nombre) VALUES
     (:name)");
   $res-> bindValue("name", $_DATA['nombre']);

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