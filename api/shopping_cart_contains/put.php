<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,   Authorization,X-Requested-With');
  
    include_once '../../config/Database.php';
    include_once '../../models/shopping_cart_contains.php';

    // start db and connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Shopping_cart object
    $Sc = new shopping_cart_contains($db);

    // get raw posted data
    $data = json_decode(file_get_contents("php://input"));


    $Sc->Customer_Id = $data->Customer_Id;
    $Sc->Art_Id = $data->Art_Id;
    $Sc->Art_qty = $data->Art_qty;


    if ($Sc->Put()){
      echo json_encode(array('message' => 'Shopping cart updated'));
    }else {
      echo json_encode(array('message' => 'Shopping cart not updated'));
    }

?>
