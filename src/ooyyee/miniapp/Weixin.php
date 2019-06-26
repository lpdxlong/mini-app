<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-24
 * Time: 16:11
 */

namespace ooyyee\miniapp;


use ooyyee\Http;

class Weixin extends MiniApp
{

    public $map = [
        'openId' => 'openid',
        'nickName' => 'nickname',
        'avatarUrl' => 'avatar',
        'unionId' => 'unionid',
        'gender' => 'gender',
    ];


    /**
     * @param string $code
     * @param array $extra
     * @return array|string
     */
    public function getSessionKey($code, $extra = array())
    {
        $url = 'https://api.weixin.qq.com/sns/jscode2session';
        $param = array(
            'appid' => $this->appid,
            'secret' => $this->secret,
            'js_code' => $code,
            'grant_type' => 'authorization_code',
        );
        return Http::get($url . '?' . http_build_query($param));
    }


    public function accessToken($refresh = false)
    {
        $CACHE_KEY = 'weixin_access_token_' . $this->appid;
        if ($refresh) {
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appid}&secret={$this->secret}";
            $result = Http::get($url);
            if (isset($result['access_token'])) {
                $access_token = $result['access_token'];
                $expires_in = (int)$result['expires_in'];
                cache($CACHE_KEY, $access_token, $expires_in - 200);
                return $access_token;
            }
            return $result;
        }
        return cache($CACHE_KEY) ?: $this->accessToken(true);
    }
}