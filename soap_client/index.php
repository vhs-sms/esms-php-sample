<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/x-icon" href="https://esms.vn/Content/images/faviicon.ico" rel="shortcut icon" />
    <title>Source Demo - eSMS.vn - D&#7883;ch v&#7909; SMS Marketing, chăm sóc khách hàng chuyên nghi&#7879;p </title>
</head>

<body>
    <h2>Source Demo - eSMS.vn - D&#7883;ch v&#7909; SMS Marketing, chăm sóc khách hàng chuyên nghi&#7879;p</h2>
    <hr />
    <?php 
    
    //Visist http://http://esms.vn/SMSApi/ApiSendSMSNormal for more information about API
    //� 2013 esms.vn
    //Website: http://esms.vn/
    //Hotline: 0902.435.340
    //Huong dan su dung API: http://esms.vn/blog/3-buoc-de-co-the-gui-tin-nhan-tu-website-ung-dung-cua-ban-bang-sms-api-cua-esmsvn
    //De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API 

    ini_set('soap.wsdl_cache_enabled', 0);
    ini_set('soap.wsdl_cache_ttl', 900);
    ini_set('default_socket_timeout', 30);

    $wsdl   = "http://rest.esms.vn/MainService.svc?wsdl";
    $APIKey="Your ApiKey"; // Lấy ApiKey tại https://account.esms.vn/Account/ApiInfomation
    $SecretKey="Your SecretKey"; // Lấy SecretKey tại https://account.esms.vn/Account/ApiInfomation
    $YourPhone="0902435340";
    $Brandname = 'MADINA';
    $Content="Welcome to esms.vn";

    $client = new SoapClient($wsdl, array('trace' => 1));
    $request_param = array(
      "ApiKey" => $APIKey,
      "Content" => $Content,
      "Phone" => $YourPhone,
      "SecretKey" => $SecretKey,
      "Brandname" => $Brandname,
      "SmsType" => "2",
      // "IsUnicode" => "1",
      // "RequestId" => "request.id.esms.1",
      // "SendBox" => "1"
    );
    var_dump($request_param);

    try
    {
      $responce_param = $client->SendMultipleMessage_V4_get($request_param);
      var_dump($responce_param);
    }
    catch (Exception $e)
    {
      echo "<h2>Exception Error!</h2>";
      echo $e->getMessage();
    }

?>

</body>

</html>