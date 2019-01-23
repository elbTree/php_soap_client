<?php

 // class elemRequest {
	// $TPW = 	
 // }
	 //$currentAction = 'GetCatalogData';

	  // initialize credentials in object format
	  $credentials = null;
	  $credentials->UserKey = '';
	  $credentials->UserName = '';
	  $credentials->Password = '';

	  $getCatalogData = array(
	  	'GetCatalogData' =>
	  	array(
	  		'elemRequest'=>
	  	array(
	  	'TPW'=>
	  		array(
	  	'Request' =>
	  		array(
	  			'RequestType'=>'PRODUCT',
	  		),
	  	'Credentials' =>
	  		array(
	  			$credentials,
	  		),
	  	),
	  )));
	 // $namespace = 'https://tempuri.org/';
	 // $header = new SoapHeader($namespace,'Credentials', $credentials);
    $action = new SoapHeader('http://www.w3.org/2005/08/addressing',
                                   'Action',
                                   'http://tempuri.org/ITPWXMLService/GetCatalogData');
    $replyTo = new SoapHeader('http://www.w3.org/2005/08/addressing','ReplyTo','http://www.w3.org/2005/08/addressing/anonymous');
    $to = new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', 'https://qawebservices.packagingwholesalers.com/TPWXMLService.svc');
	$client = new SoapClient("https://qawebservices.packagingwholesalers.com/TPWXMLService.svc?wsdl", array('soap_version' => SOAP_1_2,'trace'=> 1));
	$requestType = 'PRODUCT';
	 //$client->__setSoapHeaders($header);
	 $client->__setSoapHeaders([$action,$replyTo,$to]);
	 $params = array('RequestType' => $requestType,'Credentials'=>$credentials);
	 
	try {
	 	$result = $client->__soapCall("GetCatalogData",$getCatalogData);
	 	//$result = $client->GetCatalogData($params);
	}
	catch (SoapFault $e) {
		echo $e->getMessage();
		echo "<br/>";
		echo "Request :<br>", htmlentities($client->__getLastRequest()), "<br>";
        echo "Response :<br>", htmlentities($client->__getLastResponse()), "<br>";
		//print_r($client);
	}
	
	//var_dump($result);

	//print_r($client->__soapCall(GetCatalogData($params)));

	//var_dump($client->__getFunctions());
	// echo '<br /><br />';
	var_dump($client->__getTypes());
?>