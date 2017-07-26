<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class WechatController extends Controller
{

    public function serve()
    {
    	Log::info('request arrived');
    	$wechat = app('wechat');
    	$wechat->server->setMessageHandler(function($message){
    		return "欢迎关注柚子养老";
    	});

    	Log::info('return response.');

    	return $wechat->server->serve();
    }
}
