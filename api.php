<?php

// Números de los pilotos que pide el enunciado
$numerosPilotos = [16, 44];

foreach ($numerosPilotos as $numero) {

    $curl = curl_init(); 

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.openf1.org/v1/drivers?driver_number=" . $numero . "&session_key=latest", 
        CURLOPT_RETURNTRANSFER => true, 
        CURLOPT_FOLLOWLOCATION => true,  
        CURLOPT_ENCODING => "",          
        CURLOPT_MAXREDIRS => 10,         
        CURLOPT_TIMEOUT => 30,           
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",  
        CURLOPT_CAINFO => __DIR__ . "/cacert.pem" 
    ));

    $response = curl_exec($curl);  
    $err = curl_error($curl);      

    if ($err) {
        echo "cURL Error #: " . $err . "<br/><br/>";
    } else {
        $objeto = json_decode($response); 

        if (empty($objeto)) {
            echo "No se encontró el piloto " . $numero . "<br/><br/>";
        } else {
            echo "Piloto " . $objeto[0]->driver_number . "<br/>";
            echo "Nombre: " . $objeto[0]->full_name . "<br/>";
            echo "Escudería: " . $objeto[0]->team_name . "<br/>";
            echo "País: " . $objeto[0]->country_code . "<br/><br/>";
        }
    }
}