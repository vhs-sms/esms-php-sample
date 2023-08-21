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
 $smsType = "2";
 $brandName = "eSMS.vn";
 $callbackUrl = "https://webhook.site/380d3088-5d03-4c6b-b188-3f6a82e479cd";
 $content = "Ma xac nhan dang ky tai khoan eSMS.vn cua ban la 1214 Hotline ho tro: 0909090909";

 $curl = curl_init();
 
 $requestUrl = $baseUrl.'/MainService.svc/json/SendMultipleMessage_V4_get?ApiKey='.urlencode($apiKey).'&SecretKey='.urlencode($secretKey).'&Phone='.$yourPhone.'&Brandname='.urlencode($brandName).'&SmsType='.$smsType.'&Content='.urlencode($content);

//  print $requestUrl;

 curl_setopt_array($curl, array(
  CURLOPT_URL => $requestUrl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>