<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Overtrue\LaravelWeChat\Facade;


class WechatController
{
    protected $app;
    public function __construct()
    {
        $this->app =  Facade::miniProgram("default");
    }

    /**
     * @param Request $request
     * @return array
     * @throws \EasyWeChat\Kernel\Exceptions\DecryptException
     */
    public function decode(Request $request)
    {
        $session = $request->post("session");
        $iv = $request->post("iv");
        $encryptedData = $request->post("encryptedData");

        return $this->app->encryptor->decryptData($session,$iv,$encryptedData);
    }

    /**
     * @param Request $request
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function login(Request $request)
    {

        $code = $request->post("code");
        return $this->app->auth->session($code);
    }

}
