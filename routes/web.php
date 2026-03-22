<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//微信回调
Route::any('/wechat', 'HomeController@wechat')->name('wechat');
//黄河
Route::any('/hanghe/notifyUrl', 'HomeController@hanghenotify')->name('hanghe.notifyUrl');
//微信支付
Route::any('/wechat/notifyUrl', 'HomeController@wechatNotifyUrl')->name('wechat.notifyUrl');
//支付宝
Route::any('/ali/notifyUrl', 'HomeController@aliNotifyUrl')->name('ali.notifyUrl');

Route::any('/ali/yidingda', 'HomeController@yidingda')->name('ali.yidingda');

//奶茶
Route::any('/yiding/notifyUrl', 'HomeController@yidingdanotify')->name('yiding.notifyUrl');
//奶茶
Route::any('/naicha/notifyUrl', 'HomeController@naichanotify')->name('naicha.notifyUrl');
//七匹狼
Route::any('/qipilang/notifyUrl', 'HomeController@qipilangnotify')->name('qipilang.notifyUrl');
//融合
Route::any('/ronghe/notifyUrl', 'HomeController@ronghenotify')->name('ronghe.notifyUrl');
//美金
Route::any('/meijin/notifyUrl', 'HomeController@meijinnotify')->name('meijin.notifyUrl');
//金易
Route::any('/jinyi/notifyUrl', 'HomeController@jinyinotify')->name('jinyi.notifyUrl');
//丰享
Route::any('/fengxiang/notifyUrl', 'HomeController@fengxiangnotify')->name('fengxiang.notifyUrl');
//丰享2
Route::any('/fengsun/notifyUrl', 'HomeController@fengsunnotify')->name('fengsun.notifyUrl');
//丰享2
Route::any('/huifu/notifyUrl', 'HomeController@huifunotify')->name('huifu.notifyUrl');
//d东升
Route::any('/dongsheng/notifyUrl', 'HomeController@dongshengnotify')->name('dongsheng.notifyUrl');
//九鑫
Route::any('/jiuxin/notifyUrl', 'HomeController@jiuxinnotify')->name('jiuxin.notifyUrl');
//万顺
Route::any('/wansun/notifyUrl', 'HomeController@wansunnotify')->name('wansun.notifyUrl');

//飞财
Route::any('/feicai/notifyUrl', 'HomeController@feicainotify')->name('feicai.notifyUrl');
//飞财
Route::any('/caiyue/notifyUrl', 'HomeController@caiyuenotify')->name('caiyue.notifyUrl');
//飞财
Route::any('/hongyun/notifyUrl', 'HomeController@hongyunnotify')->name('hongyun.notifyUrl');

//校正排行榜
Route::any('/web/teamchongzhi', 'HomeController@teamchongzhi')->name('web.teamchongzhi');
Route::any('/web/teamtixian', 'HomeController@teamtixian')->name('web.teamtixian');

Route::any('/web/guiling', 'HomeController@guiling')->name('web.guiling'); // 去掉日收归零
Route::any('/web/jhuotongji', 'HomeController@jhuotongji')->name('web.jhuotongji'); // 去掉日收归零
