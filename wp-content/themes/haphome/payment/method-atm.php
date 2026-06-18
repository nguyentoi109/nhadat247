<?php

if (!defined('ABSPATH')) exit;

require_once __DIR__.'/vnpay-create.php';

function bds_render_atm($amount,$order,$bank){

    $bankMap=[

        "vietcombank"=>"VNBANK",

        "bidv"=>"VNBANK",

        "techcombank"=>"VNBANK",

        "acb"=>"VNBANK",

        "mbbank"=>"VNBANK",

        "agribank"=>"VNBANK",

        "vietinbank"=>"VNBANK",

        "vpbank"=>"VNBANK",

        "tpbank"=>"VNBANK",

        "hdbank"=>"VNBANK",

        "shb"=>"VNBANK",

        "vib"=>"VNBANK",

        "abbank"=>"VNBANK"

    ];

    return bds_create_vnpay_url(

        $amount,

        $bankMap[$bank]??"VNBANK"

    );

}