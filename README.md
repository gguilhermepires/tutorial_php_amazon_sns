# tutorial_php_amazon_sns

1) Instalar o sdk via composer(composer require aws/aws-sdk-php)

2) Criar um usuário no IAM , com permissão para acessar o sns

AmazonSNSFullAccess
AmazonSNSReadOnlyAccess
AmazonSNSRole

3) criar arquivo php
#código enviar mensagem sms
<?php
//
require '../vendor/autoload.php';

$params = array(
    'credentials' => array(
        'key' => 'usuarii_key_aqui',
        'secret' => 'usuario_key_secret_aqui',
    ),
    'region' => 'us-east-1', // < your aws from SNS Topic region
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
    "PhoneNumber" => "+5521993948009"   // Provide phone number with country code
);
$result = $sns->publish($args);
var_dump($result); // You can check the response


#retorno
object(Aws\Result)#120 (2) { ["data":"Aws\Result":private]=> array(2) { ["MessageId"]=> string(36) "71f675e4-7723-5cb1-94f9-2d25242ad041" ["@metadata"]=> array(4) { ["statusCode"]=> int(200) ["effectiveUri"]=> string(35) "https://sns.us-east-1.amazonaws.com" ["headers"]=> array(4) { ["x-amzn-requestid"]=> string(36) "8cd28034-a5ac-5a09-8489-d8f5f6a5b6f9" ["content-type"]=> string(8) "text/xml" ["content-length"]=> string(3) "294" ["date"]=> string(29) "Tue, 09 Mar 2021 10:41:13 GMT" } ["transferStats"]=> array(1) { ["http"]=> array(1) { [0]=> array(0) { } } } } } ["monitoringEvents":"Aws\Result":private]=> array(0) { } }


