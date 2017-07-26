<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Message\Text;
use Log;

class WechatController extends Controller
{
    private $wechat;
    public function __construct()
    {
        $this->wechat = app('wechat');
    }

    public function serve()
    {
    	Log::info('request arrived');
        $menu = self::setMenu();

    	$this->wechat->server->setMessageHandler(function($message){
    		return "欢迎关注柚子养老";
    	});

    	Log::info('return response.');

    	return $this->wechat->server->serve();
    }
    public function setMenu()
    {
        $menu = $this->wechat->menu;
        $buttons = [
            [
                "name"       => "扫码",
                "sub_button" => [
                    [
                        "type" => "scancode_waitmsg",
                        "name" => "扫码带提示",
                        "key"=> "rselfmenu_0_0",
                    ],
                    [
                    "type" => "scancode_push",
                        "name" => "扫码推事件",
                        "key"=> "rselfmenu_0_1",
                    ] 
                ],
            ],
        ];
        $menu->add($buttons);
        
    }
}
