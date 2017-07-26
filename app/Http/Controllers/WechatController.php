<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Message\Text;
use Log;

class WechatController extends Controller
{

    public function serve()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message) {
            switch ($message->MsgType) {
                case 'event':
                    if($message->Event == 'subscribe')
                    {
                        return "欢迎关注骑乐马术俱乐部！1";
                    }else if($message->Event == 'unsubscribe'){
                        return "欢迎关注骑乐马术俱乐部！2";
                    }else{
                        return "欢迎关注骑乐马术俱乐部！3";
                    }
                    break;
                case 'text':
                    return "欢迎关注骑乐马术俱乐部！4";
                    break;
                default:
                    return '欢迎关注骑乐马术俱乐部！5';
                    break;
            }
        });
        return $wechat->server->serve();
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
