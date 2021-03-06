<?php
//composer require aws/aws-sdk-php
require '../vendor/autoload.php';

$params = array(
    'credentials' => array(
        'key' => 'sua_key',
        'secret' => 'sua_secret',
    ),
    'region' => 'us-east-1', 
    'version' => 'latest'
);
$sns = new \Aws\Sns\SnsClient($params);

$args = array(
    "MessageAttributes" => [
                'AWS.SNS.SMS.SMSType' => [
                    'DataType' => 'String',
                    'StringValue' => 'Transactional'
                ]
            ],
    "Message" => "Hello word",
    "PhoneNumber" => "+5521993948009"  
);


$result = $sns->publish($args);

var_dump($result); 



#retorno
// object(Aws\Result)#120 (2) { ["data":"Aws\Result":private]=> array(2) { ["MessageId"]=> string(36) "71f675e4-7723-5cb1-94f9-2d25242ad041" ["@metadata"]=> array(4) { ["statusCode"]=> int(200) ["effectiveUri"]=> string(35) "https://sns.us-east-1.amazonaws.com" ["headers"]=> array(4) { ["x-amzn-requestid"]=> string(36) "8cd28034-a5ac-5a09-8489-d8f5f6a5b6f9" ["content-type"]=> string(8) "text/xml" ["content-length"]=> string(3) "294" ["date"]=> string(29) "Tue, 09 Mar 2021 10:41:13 GMT" } ["transferStats"]=> array(1) { ["http"]=> array(1) { [0]=> array(0) { } } } } } ["monitoringEvents":"Aws\Result":private]=> array(0) { } }