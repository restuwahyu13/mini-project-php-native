<?php
	$asal = $_POST['kota'];
	$tujuan = $_POST['kabu'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
		
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$tujuan."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_ENCODING => "gzip, deflate, br",
	  CURLOPT_HTTP_VERSION => $_SERVER['SERVER_PROTOCOL'],
	  CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: 434d3c04fc285d218d740e2a568387e4"
	  ),
	));

	$output = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

   if($output === 200) {

	echo $output;

   }
	
   curl_close($curl);
	
?>