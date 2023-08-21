<?php

	//Visist http://http://esms.vn/SMSApi/ApiSendSMSNormal for more information about API
	//� 2013 esms.vn
	//Website: http://esms.vn/
	//Hotline: 0902.435.340      
   
	//Huong dan chi tiet cach su dung API: http://esms.vn/blog/3-buoc-de-co-the-gui-tin-nhan-tu-website-ung-dung-cua-ban-bang-sms-api-cua-esmsvn
	//De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API
	$URL = "http://rest.esms.vn/MainService.svc/json/MultiChannelMessage/"; 
    $APIKey="Your ApiKey";
	$SecretKey="Your SecretKey";
	$YourPhone="0902435340";
	$TempID="200300";
	$OAID="4361812075662036180";
	$CallbackUrl = "https://your-site.com/eSMS/ReceiveZNSState";

	$curl = curl_init($URL);
	curl_setopt($curl, CURLOPT_URL, $URL);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
   		"Content-Type: application/json",
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	$data = '
		{
			"ApiKey": "'.$APIKey.'",
			"SecretKey": "'.$SecretKey.'",
			"Phone": "'.$YourPhone.'",
			"Channels": [
				"zalo",
				"sms"
			],
			"Data": [
				{
					"AOID": "'.$OAID.'",
					"TempID": "200300",
					"Params": [
						"9786",
						"Nguyen Quy"
					],
					"CallbackUrl": "https://your-site.com/eSMS/channel/zalo"
				},
				{
					"Content": "Ma xac nhan dang ky tai khoan eSMS.vn cua ban la 892374 Hotline ho tro:0902.435.340",
					"Phone": "'.$YourPhone.'",
					"IsUnicode": 0,
					"SmsType": 2,
					"Brandname": "eSMS.vn",
					"CallbackUrl": "https://your-site.com/eSMS/channel/sms"
				}
			]
		}
	';
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($curl);
	curl_close($curl);
		
	$obj = json_decode($result, true);
    if($obj['CodeResult']==100)
    {
        print "<br>";
        print "CodeResult:".$obj['CodeResult'];
        print "<br>";
        print "CountRegenerate:".$obj['CountRegenerate'];
        print "<br>";     
        print "SMSID:".$obj['SMSID'];
        print "<br>";
    }
    else
    {
        print "ErrorMessage:".$obj['ErrorMessage'];
    }
    


?>