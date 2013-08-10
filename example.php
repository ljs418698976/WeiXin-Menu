<?php

require 'WeiXin_Menu.php';

$dd = '{
	"button":[{	
		"type":"click",
		"name":"微生活",
		"key":"V1001_TODAY_MUSIC"
	},
	{
		"type":"click",
		"name":"微旅游",
		"key":"V1001_TODAY_SINGER"
	},
	{
		"name":"我的捷程",
		"sub_button":[{
			"type":"click",
			"name":"我的订单",
			"key":"V1001_HELLO_WORLD"
		},
		{
			"type":"click",
			"name":"收藏夹",
			"key":"V1001_HELLO_WORLD"
		},
		{
			"type":"click",
			"name":"个人资料",
			"key":"V1001_GOOD"
		}]
	}]
}';

$aa = new WeiXin_Menu($dd);
echo "ok";
?>