<?php

	
	                                                         
                                                                                  
                                                                                                                     
$ch = curl_init('https://api.neshan.org/v5/reverse?lat=35.709653&lng=51.343403');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
                                                                                                                                    
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                   
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	'User-Agent: PostmanRuntime/7.29.2', 
	'Accept: */*',
	'Content-Type: application/json',
	'Api-Key: service.6468e3da2c1644318fc1a2afbd458ad5'
	)                                                                     
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);

curl_close($ch);

//var_dump(json_decode($result, true));

$data2 = json_decode(trim($result), TRUE);

echo $data2['formatted_address'];

?>