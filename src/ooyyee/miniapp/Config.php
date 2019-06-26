<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-24
 * Time: 16:13
 */

namespace ooyyee\miniapp;


class Config
{
    private $appid;
    private $secret;
    private $provider;
    private $token;

    /**
     * @param string $appid
     * @param string $secret
     * @return Config
     */
    public static function create($appid,$secret,$provider){

        $self=new static();
        $self->setAppid($appid);
        $self->setSecret($secret);
        $self->setProvider($provider);
        return $self;

    }

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * @param mixed $appid
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }



}