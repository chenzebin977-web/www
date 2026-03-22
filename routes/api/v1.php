<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$api = app('Dingo\Api\Routing\Router');

$apiParams = [
    'version' => 'v1',
    'prefix' => 'api',
//    'domain' => env('APP_DOMAIN'),
    'namespace' => 'App\\Http\\Controllers\\Api\\V1',
    'middleware' => ['json.response.modifier']
];

// v1 version API
//add in header Accept:application/vnd.wx.v1+json 严格模式下添加头部信息
$api->group($apiParams, function ($api) {
    //首页模块
    $api->group(['prefix' => 'index', 'namespace' => 'Index'], function ($api) {
        //配置接口
        $api->post('get_setting','CommonController@setting')->name('index.common.setting');
         //获取版本号
        $api->post('get_version','CommonController@version')->name('index.common.version');
         $api->get('getordersno','CommonController@getordersno')->name('index.common.getordersno');  //获取订单号
        //信号强度检测
        $api->post('getline','CommonController@getLine')->name('index.common.getLine');
        //登录遇到问题
        $api->post('feedback','CommonController@feedback')->name('index.common.feedback');
        //轮播图
        $api->post('get_banner','CommonController@banner')->name('index.common.banner');
        //充值通道
        $api->post('get_recharge_channel','CommonController@rechargeChannel')->name('index.common.rechargeChannel');
        //登录
        $api->post('login','UserController@login')->name('index.user.login');
        $api->post('appdown','UserController@appdown')->name('index.user.appdown');
        
        //注册
        $api->post('reg','UserController@register')->name('index.user.register');
        //验证手机号是否注册
        $api->post('check_phone','UserController@checkPhone')->name('index.user.checkPhone');
        //邀请好友排行榜
        $api->post('ranklist','UserController@rankList')->name('index.user.rank.list');
        //公告列表
        $api->post('noticelist','ArticleController@noticeList')->name('index.article.noticeList');
        //公告详情
        $api->post('notice','ArticleController@notice')->name('index.article.notice');
        //新闻列表
        $api->post('newslist','ArticleController@newsList')->name('index.article.newsList');
        //新闻详情
        $api->post('news','ArticleController@news')->name('index.article.news');
        //关于我们分类
        $api->post('article_cate','ArticleController@articleCate')->name('index.article.article_cate');
        //关于我们详情
        $api->post('article','ArticleController@article')->name('index.article.article');
        //图形验证码
        $api->post('captcha','CommonController@captcha')->name('index.common.captcha');
         //获取获取信的接口
        $api->post('getLinenews','CommonController@getLinenews')->name('index.common.getLinenews');
    });
    //用户模块
    $api->group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['check.api.login']], function ($api) {
        // 个人信息
        $api->post('index','UserController@index')->name('user.index');
        // 用户信息
        $api->post('info','UserController@info')->name('user.info');
        //个人资金钱包
        $api->post('price','UserController@price')->name('user.price');
        // 资金明细
        $api->post('price_log','UserController@priceLog')->name('user.price.log');
        // 提交实名认证
        $api->post('authadd','UserController@authadd')->name('user.authadd');
        // 获取实名认证信息
        $api->post('authinfo','UserController@authinfo')->name('user.authinfo');
        // 设置资金密码
        $api->post('set_securitypass','UserController@setSecurityPass')->name('user.set.security.pass');
        // 修改资金密码
        $api->post('update_securitypass','UserController@updateSecurityPass')->name('user.update.security.pass');
        // 修改登录密码
        $api->post('update_pass','UserController@updatePass')->name('user.update.pass');
        // 团队人数统计
        $api->post('team','UserController@team')->name('user.team');
        // 签到
        $api->post('sign','SignController@store')->name('user.sign.store');
        // 已签到天数
        $api->post('signinfo','SignController@info')->name('user.sign.info');
        //补签
        $api->post('supplementary','SignController@supplementary')->name('user.sign.supplementary');
        // 中奖记录
        $api->post('signreward','SignController@reward')->name('user.sign.reward');
        // 中奖记录假数据
        $api->post('signlist','SignController@list')->name('user.sign.list');
        // 抽奖
        $api->post('choujiang','SignController@lottery')->name('user.sign.lottery');
        // 银行卡-列表
        $api->post('wallet','BankController@list')->name('user.bank.list');
        // 银行卡-添加
        $api->post('save_wallet','BankController@store')->name('user.bank.store');
        // 银行卡-详情
        $api->post('wallet_info','BankController@detail')->name('user.bank.detail');
        // 银行卡-删除
        $api->post('wallet_del','BankController@delete')->name('user.bank.delete');
        // 提现可选资金类型
        $api->post('moneytype','WithdrawController@moneyType')->name('user.withdraw.money.type');
        // 提现
        $api->post('withdrawal','WithdrawController@store')->name('user.withdraw.store');
        // 提现记录
        $api->post('withdrawal_list','WithdrawController@record')->name('user.withdraw.record');
        // 互转
        $api->post('transfer','TransferController@store')->name('user.transfer.store');
        // 互转记录
        $api->post('transfer_list','TransferController@record')->name('user.transfer.record');
        // 充值
        $api->post('recharge','RechargeController@store')->name('user.recharge.store');
        // 充值记录
        $api->post('recharge_list','RechargeController@list')->name('user.recharge.list');
        // 团队-统计
        $api->post('team','TeamController@static')->name('user.team.static');
        // 团队-邀请好友/团队津贴
        $api->post('inviteinfo','TeamController@invite')->name('user.team.invite');
        // 获取团队列表
        $api->post('lower_user','TeamController@list')->name('user.team.list');
        // 邀请奖励列表
        $api->post('inviteConfig','TeamController@config')->name('user.team.config');
        // 邀请奖励详情
        $api->post('inviteDetail','TeamController@detail')->name('user.team.detail');
        // 获取项目
        $api->post('withdrawal_pro','UserController@withdrawal_pro')->name('user.withdrawal_pro');
        // 缴纳审计费
        $api->post('withdrawal_projn','UserController@withdrawal_projn')->name('user.withdrawal_projn');
        // 获取协议
        $api->post('withdrawal_xy','UserController@withdrawal_xy')->name('user.withdrawal_xy');
        // 签署协议
        $api->post('withdrawal_qm','UserController@withdrawal_qm')->name('user.withdrawal_qm');
        // 缴纳保证金
        $api->post('withdrawal_xyjn','UserController@withdrawal_xyjn')->name('user.withdrawal_xyjn');

        //最新通知列表
        $api->post('message','MessageController@index')->name('user.message.index');
        //最新通知列表未读数量
        $api->post('messageCount','MessageController@count')->name('user.message.count');
        //最新通知详情
        $api->post('messageDetail','MessageController@detail')->name('user.message.detail');
        //获取工资列表信息
        $api->post('salary','TeamController@salary')->name('user.team.salary');
        //退出登录
        $api->post('logout','UserController@logout')->name('user.logout');
        //互转可选资金类型
        $api->post('transfer_wallet','TransferController@wallet')->name('user.transfer.wallet');

        //个人养老金-创建
        $api->post('pension_add','PensionController@add')->name('user.pension.add');
        //个人养老金-详情
        $api->post('pension_detail','PensionController@detail')->name('user.pension.detail');
        //个人养老金-转入钱包
        $api->post('pension_wallet','PensionController@wallet')->name('user.pension.wallet');
        //个人养老金-转入
        $api->post('pension_transfer','PensionController@transfer')->name('user.pension.transfer');
        //个人养老金-转入记录
        $api->post('pension_transfer_record','PensionController@transferRecord')->name('user.pension.transfer.record');
        //个人养老金-提现钱包
        $api->post('pension_withdraw_wallet','PensionController@withdrawWallet')->name('user.pension.withdraw.wallet');
        //个人养老金-提现记录
        $api->post('pension_withdraw_record','PensionController@withdrawRecord')->name('user.pension.withdraw.record');
        //个人养老金-开通列表
        $api->post('pension_record','PensionController@pensionRecord')->name('user.pension.record');
        //个人养老金-利息发放明细
        $api->post('state_record','PensionController@stateRecord')->name('user.state.record');
        //app下载
        $api->post('appInfo','UserController@appInfo')->name('index.user.app.info');
        //登录记录
        $api->post('login_record','UserController@loginRecord')->name('index.user.login.record');
         //居民档案
          $api->post('jnfystatus','JnfyController@jnfystatus')->name('user.jnfy.jnfystatus');
        $api->post('jnfy','JnfyController@jnfy')->name('user.jnfy.jnfy');
        $api->post('jnfyinfo','JnfyController@jnfyinfo')->name('user.jnfy.jnfyinfo');
        //提现办理
          $api->post('txblstatus','TxblController@txblstatus')->name('user.txbl.txblstatus');
        $api->post('txbl','TxblController@txbl')->name('user.txbl.txbl');
        $api->post('txblinfo','TxblController@txblinfo')->name('user.txbl.txblinfo');
    });

    $api->group(['prefix' => 'card', 'namespace' => 'Card','middleware' => ['check.api.login']], function ($api) {
        // 收获地址列表
        $api->post('address_list','AddressController@list')->name('card.address.list');
        // 收获地址添加编辑
        $api->post('address_edit','AddressController@edit')->name('card.address.edit');
        // 收获地址详情
        $api->post('address_detail','AddressController@detail')->name('card.address.detail');
        // 收获地址删除
        $api->post('address_del','AddressController@del')->name('card.address.del');
    });

    $api->group(['prefix' => 'product', 'namespace' => 'Product'], function ($api) {
        // 项目分类
        $api->post('catelist','IndexController@cateList')->name('product.index.cate.list');
        // 项目列表
        $api->post('lists','IndexController@list')->name('product.index.list');
        // 项目详情
        $api->post('detail','IndexController@detail')->name('product.index.detail')->middleware('check.api.login');
        // 购买立即领取
        $api->post('add','IndexController@buy')->name('product.index.buy')->middleware('check.api.login');
        // 申购记录
        $api->post('order','IndexController@order')->name('product.index.order')->middleware('check.api.login');
        // 上传宣传视频/图片
        $api->post('uploadvideo','IndexController@uploadvideo')->name('user.uploadvideo');
    });

    //国家政务补贴登记
    $api->group(['prefix' => 'subsidy', 'namespace' => 'Subsidy', 'middleware' => ['check.api.login']], function ($api) {
        // 获取分类
        $api->post('category','IndexController@category')->name('subsidy.index.category');
        //国家政务补贴登记添加
        $api->post('store','IndexController@store')->name('user.index.store');
        //国家政务补贴登记详情
        $api->post('detail','IndexController@detail')->name('user.index.detail');
        //缴费
        $api->post('payment','IndexController@payment')->name('user.index.payment');
    });

    $api->group(['prefix' => 'juankuan', 'namespace' => 'Juankuan'], function ($api) {
        // 捐款
        $api->post('add','UserController@add')->name('user.add');
        // 捐款类目
        $api->post('cate_list','UserController@cate_list')->name('user.cate_list');
    });

    $api->group(['prefix' => 'house', 'namespace' => 'House', 'middleware' => ['check.api.login']], function ($api) {
        // 提交领取
        $api->post('add','IndexController@add')->name('house.index.add');
        // 领取详情
        $api->post('orderinfo','IndexController@orderinfo')->name('house.index.orderinfo');
        // 去缴费
        $api->post('jiaofei','IndexController@jiaofei')->name('house.index.jiaofei');
        // 获取数据
        $api->post('withthree','IndexController@withThree')->name('house.index.withthree');
        // 点击领取
        $api->post('withthree_add','IndexController@withthree_add')->name('house.index.withthree_add');
        // 登记缴纳
        $api->post('withthree_jiaona','IndexController@withthree_jiaona')->name('house.index.withthree_jiaona');
        // 签署合同
        $api->post('withfourAdd','IndexController@withfourAdd')->name('house.index.withfourAdd');
        // 保险缴纳
        $api->post('withfourJiaona','IndexController@withfourJiaona')->name('house.index.withfourJiaona');
        // 获取数据
        $api->post('withfourInfo','IndexController@withFourInfo')->name('house.index.withfourInfo');
        // 获取贷款信息
        $api->post('withfiveinfo','IndexController@withFiveInfo')->name('house.index.withfiveinfo');
        // 申请贷款
        $api->post('withfiveadd','IndexController@withfiveadd')->name('house.index.withfiveadd');
        // 申请贷款
        $api->post('withfiveJiaona','IndexController@withfiveJiaona')->name('house.index.withfiveJiaona');
    });

    $api->group(['prefix' => 'common', 'namespace' => 'Common'], function ($api) {
        // 上传文件
        $api->post('upload','IndexController@upload')->name('common.upload');
    });

    //在线会议
    $api->group(['prefix' => 'meeting', 'namespace' => 'Meeting', 'middleware' => ['check.api.login']], function ($api) {
        // 在线会议
        $api->post('list','IndexController@list')->name('meeting.list');
        //会议记录
        $api->post('playback','IndexController@playback')->name('meeting.playback');
        //参加会议
        $api->post('participate','IndexController@participate')->name('meeting.participate');
        //每日问答
        $api->post('question','QuestionController@index')->name('meeting.question.index');
        //问答回答
        $api->post('answer','QuestionController@answer')->name('meeting.question.answer');
    });

    $api->any('check_level', 'Index\CommonController@checkLevel');//域名通畅测试
    //阿青测试接口
         $api->get('ceshi','Index\CommonController@ceshi');
});
