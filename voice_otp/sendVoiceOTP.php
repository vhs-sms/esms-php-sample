<?php

	//� 2013 esms.vn
	//Website: https://esms.vn
	//Hotline: 0902.435.340
	// API Documents: https://esms.vn/eSMS.vn_TailieuAPI.pdf
   
	//Huong dan chi tiet cach su dung API: http://vih.bz/3KYZ
	//De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API 
    $APIKey = "Your ApiKey";
	$SecretKey = "Your SecretKey";
	$YourPhone = "0902435340";
	$Code = rand(100000,1000000);
	$Speed = -1;
	$Voice = "hatieumai";
	
	$data = "http://voiceapi.esms.vn/MainService.svc/json/VoiceOTP?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Code=$Code&Speed=$Speed&Voice=$Voice";
	
	$curl = curl_init($data); 
	curl_setopt($curl, CURLOPT_FAILONERROR, true); 
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
	$result = curl_exec($curl); 
		
	$obj = json_decode($result,true);
    if($obj['CodeResult'] == 100)
    {
        print "<br>";
        print "CodeResult:".$obj['CodeResult'];
        print "<br>";
        print "SMSID:".$obj['SMSID'];
        print "<br>";
    }
    else
    {
        print "ErrorMessage:".$obj['ErrorMessage'];
    }
    


?>