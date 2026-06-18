<?php
if (!defined('ABSPATH')) exit;

require_once __DIR__.'/vnpay-config.php';

function bds_create_vnpay_url($amount,$bank){

    $txnRef=time();

    $inputData=[

        "vnp_Version"=>"2.1.0",

        "vnp_Command"=>"pay",

        "vnp_TmnCode"=>VNPAY_TMN_CODE,

        "vnp_Amount"=>$amount*100,

        "vnp_CurrCode"=>"VND",

        "vnp_TxnRef"=>$txnRef,

        "vnp_OrderInfo"=>"Nap tien",

        "vnp_OrderType"=>"other",

        "vnp_ReturnUrl"=>VNPAY_RETURN_URL,

        "vnp_IpAddr"=>$_SERVER['REMOTE_ADDR'],

        "vnp_CreateDate"=>date("YmdHis"),

        "vnp_Locale"=>"vn",

    ];

    if($bank!=""){
        $inputData["vnp_BankCode"]=$bank;
    }

    ksort($inputData);

    $query=http_build_query($inputData);

    $hash=hash_hmac(

        "sha512",

        urldecode($query),

        VNPAY_HASH_SECRET

    );

    return VNPAY_URL."?".$query."&vnp_SecureHash=".$hash;

}