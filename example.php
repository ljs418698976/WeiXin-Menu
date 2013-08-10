<?php

require 'WeiXin_Menu.php';

$menu = array(
	"button" => array(
		array(
			"type" => "click",
			"name" => urlencode("微生活"),
			"key" => "KEY_1"
		),
		array(
			"type" => "click",
			"name" => urlencode("微旅游"),
			"key" => "KEY_2"
		),
		array(
			"name" => urlencode("我的捷程"),
			"sub_button" => array(
				array(
					"type" => "click",
					"name" => urlencode("我的订单"),
					"key" => "KEY_3"
				),
				array(
					"type" => "click",
					"name" => urlencode("收藏夹"),
					"key" => "KEY_4"
				),
				array(
					"type" => "click",
					"name" => urlencode("个人资料"),
					"key" => "KEY_5"
				)
			)
		)
	)
);


$menu = urldecode(json_encode($menu));
$aa = new WeiXin_Menu($menu);
echo "ok";
?>