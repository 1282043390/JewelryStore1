<?php
return [
    //应用ID,您的APPID。
    'app_id' => "2016100100638372",
    'seller_id' => "2088102178083400",

    //商户私钥
    'merchant_private_key' =>"MIIEpQIBAAKCAQEA2NQl33TiyRo5ou1zuHUByzNjPua5I+ON3TGkByPAGkPjxVzXTlY925zbmWQ9UlWO6t66c269oEqWbfsz3xFmT62/iokwaaF/K3GjnoY12A94pisJiU8GXvrD0p5SGoXYszrhwSXBS4oztyXLZTi8XW6Nd4QnD9XFbBipJkP7oOSQXLG/WU6lfLfQ+Jc3PcRTg2vm/BfMt2OMlqb6VAJ1mRNmzkrZ15xaPgVWyfrGZNHUMKWLXUSfraCoi6oL8Aa6hzZ+1MSeGJd57MHxHcKdT2e1vfwE2rhpYSR+6SmGjBtefdsCAD4t91+eApcztamWxbwzi8eHnQ1WRhCIp6iMBQIDAQABAoIBAQCN7Kbxkd+TxG+vfn99YFERQYyXsovCuwKzovd7mOH4DzH6kF95rieFJTH0QFGHH+uRPsKKJhVG4yt9x6xXOVtfkhnKwyuGKKhFtndjnvOFffL5yTfPwYMpDji5Ftok9DE4d7UnKOBR4p8hJULx+WYKPf+pGD49Ni6oJ6goHN2KnHxyLunxR5ifZeMwWvJQjIOBrDv4WI/SIS2LAtELoWFO2e8YP0Mp3ydZZBG3OYv1FBPpJoUA8sISnuxiTmzpi4BnU6dfur1TXTphv/wDpzWV3xNbhpV3zIOMH7AVPryvu9BlJCRFooH7FQYatKhAaXj/XCMVqilDLeWF+ta1icbBAoGBAPL/R75csDsMUH2oR43SalT04qEOKS/bnJ6X1pY6BPza+K9ZuXddAj+q0N+6FRW5SA/cCH3esYKFiqK7a7aAkeEv/iriAAyxa8bURLrqF17q6oRVH7Cl0NKyzdTcU1zQw332/AelEf1fHVpG/sKenY2T47mnnbaTGKc5ZkzKS4PxAoGBAORuZXAQYYJYltBFjOrGilCvLnm4aOpdK6luLTtC5ZCo+6F5lCa6ifWqwFZc5Fos3aNhiwj5We4zJntY+n2cVOpqYdqB8juuX/8t1vNgcyg1tainfi5ketwHYF9jOi73/alLlv35VQYQl9wAnUOUTO1Zm6+GYM9jxqTknnYVio1VAoGAekDNC4z+bPbJGC8tsMCIFq4NxxGkzxsiNPgXUgVmtQBF1ZLCqLb2hqmd5LFuIjvRcYk2DH2ZuR0OnsjEbFFLE4xdx51kgP5SRvpMie10TKDL1EAvbWQ/J4Il5E3k8vFlKV61dfMqldrgnabSTYAXrD8XdzRJOK3Q3XEXctLkI0ECgYEAyDHoPJpemrnBEq6hnXB679NXy91ONXeKOGcSxQkP4AP447+Fk5uQJPmMryOiDVWcuP9Xtnmx0wyJATkt7r//u6GYOMQB40QjZaRq6cjxo5/OoQyJjWcKNaNRVsfDyj4U1TYmElddqH8KWAlBymRCNxF9XAtM9PTgtsqWBa9DSjECgYEAqrC89IWmBKv8s2eLqStGaI53vwe8rLKDqyUe7WrW0g2eOxhXMqeeMqt7FROZQFsLXA5V/KeiqEyf+M5oLDsa2Qb9RqqpSrkUsS7Wc4WqCqmRiTNbYtmBazouAmrf1soBFit+WvK1wCtF0l547TR5SXAeF3rXH5Q93wptYnVL9w4=",
    //异步通知地址
    'notify_url' => "http://www.jewelrystore.com/Pay/notifyUrl",

    //同步跳转
    'return_url' => "http://www.jewelrystore.com/Pay/returnUrl",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhbc/GSHCEO/iDfaeZP2bGEH/uutyoTi1l45jOPME7dBANnMJZ6q+pfD+JRk6wdykG9g9wtwI8aiVFbvAfKnroLnA6p5JVbRt52LYO5Ps4L+WOp68O5K8EtYBm29+S4iwbKzxl2aH0YDNQkogKHwVLbUlKschm86aIJB9PLFGmKYEUAXREpq8pFPLeRE4vpRDmjmVk8VS3gKsZQdjTVpWDuJg9afREvzy5S2xowVq7d6lDDiNIHLfl/yfouPHAVXD+Ct6m3k2Sze5HibMfqnbWZqIlNoh7EjcDjs7PMxyX63eWk6+POc0ZGYUQkQeKBuo7QodEuJPBt25Lv76I435/QIDAQAB",
];