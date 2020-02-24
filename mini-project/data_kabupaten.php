<?php

$provinsi_id = $_GET['prov_id'];

$ch = curl_init();

curl_setopt_array($ch, array(

    CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
    CURLOPT_HTTPHEADER => array("key: 434d3c04fc285d218d740e2a568387e4", "content-type: application/x-www-form-urlencoded"),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_ENCODING => "gzip, deflate, br",
    CURLOPT_HTTP_VERSION => $_SERVER["SERVER_PROTOCOL"],
    CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT']
));

$output = curl_exec($ch);

curl_close($ch);

$data = json_decode($output, true);

for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {

    echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option >";
}


 