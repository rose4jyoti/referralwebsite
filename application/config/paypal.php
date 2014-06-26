<?php

defined('SYSPATH') or die('No direct script access.');

return array(
    'sandbox' => array(
        'username' => 'lucc_api1.luckyreferral.com',
        'password' => '1403558282',
        'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AusEGv4r8cFVzonNTCEk26lmFGyT',
        'ipn_enabled' => FALSE,
        'client_options' => array(
            CURLOPT_CAINFO => APPPATH . 'ca-bundle.crt'
        )

    )
);
