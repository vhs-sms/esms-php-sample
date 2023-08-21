<?php
/**
 * Đây là code mẫu gửi ZNS do team develop của eSMS phát triển
 * Ở ví dụ này, chúng tôi sử dụng thư viện CURL mặc định của PHP
 * để thực hiện lệnh gọi api.
 * 
 * Nếu server PHP của bạn chưa có thư viện này thì bạn có thể research Google để cài đặt
 * hoặc liên hệ đơn vụ cung cấp server để được họ hỗ trợ cài đặt nhé.
 * -----
 * Website: https://esms.vn
 * Hotline: 0902.435.340
 * Api Document: https://developers.esms.vn/
 */

 $baseUrl = "https://rest.esms.vn";
 $apiKey = "Your Api Key";
 $secretKey = 'Your Secret Key';
 $yourPhone = "0902435340";
 $oaId = "4097311281936189049";
 $tempId = "200607";
 $callbackUrl = "https://webhook.site/380d3088-5d03-4c6b-b188-3f6a82e479cd";

 $curl = curl_init();
 
 curl_setopt_array($curl, array(
  CURLOPT_URL => $baseUrl.'/MainService.svc/json/SendZaloMessage_V4_post_json/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "ApiKey": "'.$apiKey.'",
    "SecretKey": "'.$secretKey.'",
    "Phone": "'.$yourPhone.'",
    "Params": [
      "{{Params1}}","{{Params2}}","{{Params3}}"
    ],
    "TempID": "'.$tempId.'",
    "OAID": "'.$oaId.'",
    "CallbackUrl": "'.$callbackUrl.'"
  }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>