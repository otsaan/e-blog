<?php

return [

    'driver' => 'smtp',

    'host' => 'smtp.gmail.com',

    'port' => 587,

    'from' => ['address' => 'eblog.ensat@gmail.com', 'name' => 'Eblog - ENSAT'],

    'encryption' => 'tls',

    'username' => 'eblog.ensat',

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',

];
