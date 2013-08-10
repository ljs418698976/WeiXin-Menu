<?php

class WeiXin_Menu
{
	private $appid = "xxxxxxxxxxx";
	private $secret = "xxxxxxxxxxxxxxxxxxxxxx";

	function __construct($menu)
	{
		$result = $this->GetAccessToken();
		if (array_key_exists('errcode',$result)) {
			throw new Exception($result['errmsg'], 1);
		} else {
			$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $result['access_token'];
			$result = $this->Post($url,$menu);
			if ($result['errcode'] == 0) {
				//正常
			} else {
				throw new Exception($result['errcode'], 1);
			}
		}
	}

	public function Post($url, $data)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$data = curl_exec($ch);
		curl_close($ch);
		return json_decode($data,true);
	}

	public function Get($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$data = curl_exec($ch);
		curl_close($ch);
		return json_decode($data,true);
	}

	public function GetAccessToken(){
		$grant_type = "client_credential";
		$appid = $this->appid;
		$secret = $this->secret;
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type={$grant_type}&appid={$appid}&secret={$secret}";
		$result = $this->Get($url);
		return $result;
	}
}

?>