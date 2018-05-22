<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2018052160219020",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEA2qmV0TcDga9FlqfNvu9OZrbhdkfYU1rQeW4Xqziier/k6o4RY5VALO73tYjpB1YbUJ7xPaEX5je26t8InK2OZ2Ha9qjcJiAsRh6bg1JQdpIF0ieHgwtCRmhclxe5JlOkek0OGH+X8h8k1EpkVmGeoUTlMtkDMg6etmINqaLW9ReVfa0tw/0fyKHYulab/guKLwsGkgX3tatrZvZ+mQQMyIx7WOylxytWGMKm4Ai4MS5fvaIQ4gu6kjPDlwCYvPM7M9rymYt0XT0AbBnbH7VQaReEgmPU8SzO/MGxDm3+v8XYsG/K5Zkvbv+1/lWme2jZwIWHEHIdMMMuTQF9edFWdQIDAQABAoIBADZl2g+iUA0DPZytQlIt1qNW++AhH4AdJ6AN83V1MXa4JorzrP/JMZ38FUPkO5THpyP3ZqyeVwO++JKVyd6wjqzJe1/BwoL5ngoTszyITdwxl6EglGXVdzds3xv3mugeBt0mLkuJ8pMZjGAD4dJblssoCJ0Nv+3EFVfqLNv21uNB9QWxxiew5bmyedmKg6HiI90Nl9jXmfno3JfZ8XwpzNGT4WIN0DA+fBHEC2qiaHqc1u2e84/L/Hov8lsurs82EqAlpSzuMWrEALbC3Ys3zeMex/pp+VQq1gdw6GFQacW3C4GObMY/XJzhvpcW3LIXJpbGItrQd5WNHp/Q0l0e2gECgYEA7iossoqpCccZu9Q2QwI5Tge53cD++hXSnxxj4qSaFocHTXdu3mkgUanGnUK9kSwP50ScXX/5hkUnHVaFU4qe4NQTm63CjvMxaA5/del+j8dZOx1b2TS6UOQSubO8qoTT3gSZIZzP9gQ2mDzMonZrd9Fjb/Ax5++XAi/DNTjs1+0CgYEA6wmI1kVGz79UjkPD8Mf6V0x5x/5Bu8d/Agro4nQccW359AFo5En3OnF+uDzbTsK2L/SIkj2mfI6s/H/GOu3rT7mWhJqV7E7T5NIduCWMh26LnamV3h7c2kLH1ymQvygXJD1k4byphln6rdJII8ji3hKbiGoPLmCAhNhqdsNCl6kCgYEAiGSmzGkUfYEEf8j8ekufvcw26YRJgbdVs8Fygq15gUU7LWYknELgO2RbVlyOa8EsKmnkkrdjkz2vNOID4OAWNPO/dvx/25XyyYDkBgb+cCDePTiHDVFhEkpLXwZMGeuP2ioP+GvxvRaUnYLUPoZK7YeAxu5r5kQT2zC3PpenK9ECgYBUKfniILSWuADjYMjNdA7lK/F/+EA5qdqFNLroPIPi6mrTQZ36AbKSLwodl01BCuCKk5pEI+d2OvEfCfJGL+RPjDmmCmUdVazzB3q08l08Mg20y4FrJMoZLki5d5zplsWSqJlzbEeYYKgvjlle1xTGSQuA8dm11cCv0X9uP8Wc4QKBgEYMeqyAJmZHhcecwmQZcL1MdUErjkzvvNLO+vbuxJegzJ3D5G6MsdmY3z7RB3eQ59oN8yaChjd3V6ss+rEkTtUYhVngPRCBKG5WqOc7X3LNdFEBVZVAqqT6jeB6p8MVxdKhXWA702F27J/F+kcN6Xa4TTRW8jdLrDWMSq82ONLT",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjhw8AhzPnjsQcb6CgF7gOi2eR6a1bGFCSYyNRU+Y2hUapsd/CjjBWHbzTP+F21PtTcMuEESLuKihA9ZYdn1tMQ5Ux0kLd6Q0UtckWvnWh8pCJ08pX4OBe4FOSi+eWmWZM8/UfZdB3YHTtuTJjgjgLJ3lOc7izIyfI0mAkaUcs1auhzsryEYu9mAfkxD9aqEGv4ud5tKUKGCcFQu7ZEee9fDrKTuKIX86KjDyejb9qtm4lm9Gm0hPv3HqdGuEU9rH9seDLi2ULZV1gXjZdq1aOeYKtLTWFoLLEBkcamgNPuh3x56vUZ/+ESBBD7rKTOSYdHMp+3yObPySyEu7yo8hOQIDAQAB",
);