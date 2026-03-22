<?php

use App\Models\FaYlInviteLog;
use App\Models\FaZxQuestion;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test:idCardCheck',function (){
    $res = (new \App\Services\Tencent\CloudMarketService())->idCardCheck('362421198312282021','黄志');
    dd($res);
});

Artisan::command('test:checkIdCardInformation',function (){
    $res = (new \App\Services\Tencent\FaceService())->checkIdCardInformation('http://103.74.193.26:5050/uploads/20251114/9c75968dbe5ecd04aab90f25ea3135e3.jpg');
    dd($res);
});

Artisan::command('test:question',function (){
    $path = 'C:\Users\Administrator\OneDrive\桌面\全民保障问答 (2).xlsx';
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($path);
    $spreadsheet = $reader->load($path);
    $sheet = $spreadsheet->getActiveSheet();
    $data = [];
    foreach ($sheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // 这会访问每个单元格，即使它是空的
        $rowData = [];
        foreach ($cellIterator as $cell) {
            $rowData[$cell->getColumn()] = $cell->getValue();
        }
        $data[] = $rowData;
    }
    foreach ($data as $value){
        $array = [];
        $array[] = [
            'key' => 'A',
            'value' =>  str_replace('A.','',$value['C']),
        ];
        $array[] = [
            'key' => 'B',
            'value' => str_replace('B.','',$value['D']),
        ];
        $array[] = [
            'key' => 'C',
            'value' => str_replace('C.','',$value['E']),
        ];
        $array[] = [
            'key' => 'D',
            'value' =>  str_replace('D.','',$value['F']),
        ];
        //str_replace('A.','',$value['C']); //答案A
        //str_replace('B.','',$value['D']); //答案B
        //str_replace('C.','',$value['E']); //答案C
        //str_replace('D.','',$value['F']); //答案D
        str_replace('答案：','',$value['G']); //正确答案
        FaZxQuestion::query()->create([
            'problem' => $value['B'],
            'answer' => json_encode($array,true),
            'correct_answer' => str_replace('答案：','',$value['G']),
            'min_reward_amount' => 0.5,
            'max_reward_amount' => 2.0,
            'reward_wallet' => 'team',
            'createtime' => time(),
        ]);
    }
});

Artisan::command('test:sql',function (){
    \App\Models\FaZxPensionAccount::interest(2);
});
Artisan::command('test:data',function (){
    //dd(explode('-',substr(substr('-1-2-3-4-', 0, -1),1)));
    \App\Models\FaYlInviteLog::query()->chunk(1000,function ($list){
       foreach ($list as $value){
           $toMemberId = $value->to_member_id;
           $member = \App\Models\FaYlMember::query()->where(['id' => $toMemberId])->first();
           FaYlInviteLog::query()->where(['to_member_id' => $member['share_id']])->increment('team_total_count');
           FaYlInviteLog::query()->where(['to_member_id' => $member['share_id2']])->increment('team_total_count');
           FaYlInviteLog::query()->where(['to_member_id' => $member['share_id3']])->increment('team_total_count');
           if($member['combination']){
               $shareIds = explode('-',substr(substr($member['combination'], 0, -1),1));
               if(!empty($shareIds)){
                   FaYlInviteLog::query()->whereIn('to_member_id',$shareIds)->increment('total_count');
               }
           }
           if($member['is_active'] == 1){
               //增加三级内邀请人统计 新的三级
               FaYlInviteLog::query()->where(['to_member_id' => $member['share_id']])->increment('team_total_active_count');
               FaYlInviteLog::query()->where(['to_member_id' => $member['share_id2']])->increment('team_total_active_count');
               FaYlInviteLog::query()->where(['to_member_id' => $member['share_id3']])->increment('team_total_active_count');
               //增加 新的
               if($member['combination']){
                   $shareIds = explode('-',substr(substr($member['combination'], 0, -1),1));
                   if(!empty($shareIds)){
                       FaYlInviteLog::query()->whereIn('to_member_id',$shareIds)->increment('total_active_count');
                   }
               }
           }
           $order = \App\Models\FaKqProductOrder::query()->where(['member_id' => $member['id']])->first();
           if($order){
               FaYlInviteLog::query()->where(['to_member_id' => $member['id']])->update(['pro_id' => $order['pro_id']]);
           }
       }
    });
  /* 'team_total_count';
   'team_total_active_count';
   'total_count';
   'total_active_count';
   'pro_id';
   'identity_status';*/
});

Artisan::command('test:mobileCheck',function (){
      \App\Models\FaYlRealAuth::query()->with('member_info')->whereHas('member_info',function ($query){
        $query->whereIn('identity_status',['0','-1']);
    })->where('id','>',0)->chunk(2,function ($list){
        foreach ($list as $data){
            //$res = (new \App\Services\Yidun\VerifyDunService())->mobileCheck($data['realname'], $data['cardno'],$data['phone']);
            $res = (new \App\Services\Tencent\CloudMarketShanghaiService())->verifyRealName($data['cardno'],$data['phone'],$data['realname']);
            $status =  isset($res['result'])?$res['result']['res']:'-1';
            echo $data['id'].":".$data['member_id'].":".$data['realname'].":".$data['cardno'].":".$data['phone'].":".$res['code'].":".$status."\n";
            if($res['code'] == 0){
                \APP\Models\FaYlMember::query()->where(['id' =>  $data['member_id']])->update(['identity_status' => $res['result']['res']]);
            }else{
                echo json_encode($res,true);
                \APP\Models\FaYlMember::query()->where(['id' =>  $data['member_id']])->update(['identity_status' => '-1']);
            }
        }
    });
    //\App\Models\FaYlPriceMember::query()->update(['recharge_leiji' => 0]);
    /*\App\Models\FaYlInviteLog::query()->chunk(1000,function ($list){
        foreach ($list as $value){
            //同步用户表身份信息
            $identity_status = \App\Models\FaYlMember::query()->where(['id' => $value->to_member_id])->value('identity_status');
            echo "同步".$value->to_member_id.":".$identity_status."-".$value->identity_status."\r\n";
            $value->identity_status = $identity_status;
            $value->save();
        }
    });*/
    /* \App\Models\FaYlRealAuth::query()->with('member_info')->whereHas('member_info',function ($query){
        $query->whereIn('identity_status',['-1']);
    })->chunk(1000,function ($list){
        if(!empty($list->toArray())){
           foreach ($list as $data){
            $res = (new \App\Services\Yidun\VerifyDunService())->mobileCheck($data['realname'], $data['cardno'],$data['phone']);
            if($res != null){
                $status =  isset($res['result'])?$res['result']['status']:'-1';
                echo $data['id'].":".$data['member_id'].":".$data['realname'].":".$data['cardno'].":".$data['phone'].":".$res['code'].":".$status."\n";
                if($res['code'] == 200){
                    \APP\Models\FaYlMember::query()->where(['id' =>  $data['member_id']])->update(['identity_status' => $res['result']['status']]);
                }else{
                    \APP\Models\FaYlMember::query()->where(['id' =>  $data['member_id']])->update(['identity_status' => '-1']);
                }
            }
          }  
        }
    });*/
    //$res = (new \App\Services\Yidun\VerifyDunService())->mobileCheck('潘玲玲','321027199103040627','13358123456');
    //dd($res);
});

Artisan::command('test:brush',function (){
    \App\Models\FaYlMember::query()->chunk(1000,function ($list){
        foreach ($list as $value){
            if(\App\Models\FaZxBrush::query()->where(['phone' => $value->phone])->exists()){
                \App\Models\FaYlMember::query()->where(['id'=> $value->id])->update(['is_brush' => 1]);
            }
        }

    });
    /*$path = 'C:\Users\Administrator\OneDrive\桌面\水军大全.xlsx';
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($path);
    $spreadsheet = $reader->load($path);
    $sheet = $spreadsheet->getActiveSheet();
    $data = [];
    foreach ($sheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // 这会访问每个单元格，即使它是空的
        $rowData = [];
        foreach ($cellIterator as $cell) {
            $rowData[$cell->getColumn()] = $cell->getValue();
        }
        $data[] = $rowData;
    }
    foreach ($data as $value){
        \App\Models\FaZxBrush::query()->create([
            'phone' => $value['A'],
            'name' => $value['B'],
        ]);
    }*/
});


Artisan::command('test:verifyRealName',function (){
    $res = (new \App\Services\Tencent\CloudMarketShanghaiService())->verifyRealName('510121198403092274','18846684491','张磊');
    dd($res);
});

Artisan::command('test:pension',function (){
    \App\Models\FaYlMember::query()->update(['is_pension' => 0]);
    \App\Models\FaZxPensionAccount::query()->where('order_id','>',0)->chunk(1000,function ($list){
        foreach ($list as $value){
            echo $value['member_id'].',开通订单id'.$value['order_id']."\r\n";
            \App\Models\FaYlMember::query()->where(['id' => $value['member_id']])->update(['is_pension' => 1]);
        }
    });
});

//恢复redis缓存问题
Artisan::command('test:token',function (){
   \App\Models\FaYlMember::query()->chunk(1000,function ($list){
       foreach ($list as $value){
           $key = \App\Constants\RedisKeys::USER_TOKEN.$value->token;
           if(\Illuminate\Support\Facades\Cache::has($key)){
                echo "更新：".$key."\r\n";
               $member = $value->toArray();
              \Illuminate\Support\Facades\Cache::put($key, json_encode($member,true),3*24*60*60);
               //Cache::put($key, json_encode($member,true),3*24*60*60);
           }
       }
   });
});

//团队统计
Artisan::command('test:team:static {--date=}',function (){
    //\App\Models\FaZxRank::query()->truncate();
    //\App\Models\FaRankCount::query()->truncate();
    //\App\Models\FaRankActiveCount::query()->truncate();
    //\App\Models\FaRankRecharge::query()->truncate();
    //\App\Models\FaRankWithdraw::query()->truncate();
    //dd(111);
    
    \App\Models\FaZxRank::query()->where(['date' => '2025-12-14'])->delete();
    //需要按天统计
    $date = $this->option('date');
    $startTime = \Carbon\Carbon::parse($date)->startOfDay()->timestamp;
    $endTime = \Carbon\Carbon::parse($date)->endOfDay()->timestamp;
    //注册人数
    \App\Models\FaYlMember::query()
        ->select('id','create_time','share_id','share_id2','share_id3','combination')
        ->where('create_time','>=',$startTime)
        ->where('create_time','<=',$endTime)
        ->orderBy('create_time')
        ->chunk(1000,function ($list){
            foreach ($list as $value){
                $date = \Carbon\Carbon::parse($value['create_time'])->toDateString();
                $isChuli = \App\Models\FaRankCount::query()->where(['member_id' => $value['id']])->exists();
                if($isChuli){
                    echo '当前执行用户id'.$value['id'].'注册日期为'.$date."已處理\r\n";
                    continue;
                }
                if($value['share_id'] > 0){  //有直推 团队人数+1
                    $isStatic = \App\Models\FaZxRank::query()
                        ->where(['member_id' => $value['share_id'],'date' => $date])
                        ->exists();
                    if(!$isStatic){
                        \App\Models\FaZxRank::query()->insert([
                            'member_id' => $value['share_id'],
                            'date' => $date,
                            'direct_count' => 1,
                            'team_count' => 1,
                            'createtime' => time(),
                        ]);
                        echo "新增LV1：".$value['share_id']."日期".$date."\r\n";
                    }else{
                        \App\Models\FaZxRank::query()
                            ->where(['member_id' => $value['share_id'],'date' => $date])
                            ->increment('direct_count');
                        \App\Models\FaZxRank::query()
                            ->where(['member_id' => $value['share_id'],'date' => $date])
                            ->increment('team_count');
                        echo "修改LV1：".$value['share_id']."日期".$date."\r\n";
                    }
                    if($value['share_id2'] > 0){ //团队人数 + 1
                        $isStatic = \App\Models\FaZxRank::query()
                            ->where(['member_id' => $value['share_id2'],'date' => $date])
                            ->exists();
                        if(!$isStatic){
                            \App\Models\FaZxRank::query()->insert([
                                'member_id' => $value['share_id2'],
                                'date' => $date,
                                'team_count' => 1,
                                'createtime' => time(),
                            ]);
                            echo "新增LV2：".$value['share_id2']."日期".$date."\r\n";
                        }else{
                            \App\Models\FaZxRank::query()
                                ->where(['member_id' => $value['share_id2'],'date' => $date])
                                ->increment('team_count');
                            echo "修改LV2：".$value['share_id2']."日期".$date."\r\n";
                        }
                        if($value['share_id3'] > 0){ //团队人数 +1
                            $isStatic = \App\Models\FaZxRank::query()
                                ->where(['member_id' => $value['share_id3'],'date' => $date])
                                ->exists();
                            if(!$isStatic){
                                \App\Models\FaZxRank::query()->insert([
                                    'member_id' => $value['share_id3'],
                                    'date' => $date,
                                    'team_count' => 1,
                                    'createtime' => time(),
                                ]);
                                echo "新增LV3：".$value['share_id3']."日期".$date."\r\n";
                            }else{
                                \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $value['share_id3'],'date' => $date])
                                    ->increment('team_count');
                                echo "新增LV3：".$value['share_id3']."日期".$date."\r\n";
                            }
                        }
                    }
                    //需要增加伞下人数
                    $shareIds = explode('-',substr(substr($value['combination'], 0, -1),1));//线路上所有id
                    $shareRanks = \App\Models\FaZxRank::query()
                        ->select('member_id')
                        ->where(['date' => $date])
                        ->whereIn('member_id',$shareIds)
                        ->get()
                        ->pluck('member_id')
                        ->toArray();
                    $diffIds = array_diff($shareIds,$shareRanks);
                    $insertDate = [];
                    if(!empty($diffIds)){
                        foreach ($diffIds as $diffId){
                            $insertDate[] = [
                                'member_id' => $diffId,
                                'date' => $date,
                                'createtime' => time(),
                            ];
                        }
                        \App\Models\FaZxRank::query()->insert($insertDate);
                    }
                    \App\Models\FaZxRank::query()
                        ->where(['date' => $date])
                        ->whereIn('member_id',$shareIds)
                        ->increment('total_count');
                    \App\Models\FaRankCount::query()->insert(['member_id' => $value['id']]);
                    echo '当前执行用户id'.$value['id'].'注册日期为'.$date."处理完成\r\n";
                }
            }
        });
    //激活人数统计修复
    \App\Models\FaYlMember::query()
        ->where('is_active','=',1)
        ->where('is_active_time','>=',$startTime)
        ->where('is_active_time','<=',$endTime)
        ->orderBy('is_active_time')
        ->chunk(1000,function ($list){
            foreach ($list as $value){
                $date = \Carbon\Carbon::parse($value['is_active_time'])->toDateString();
                $isChuli = \App\Models\FaRankActiveCount::query()->where(['member_id' => $value['id']])->exists();
                if($isChuli){
                    echo '当前执行用户id'.$value['id'].'激活日期为'.$date."已处理\r\n";
                    continue;
                }
                if($value['share_id'] > 0){  //有直推 团队人数+1
                    $isStatic = \App\Models\FaZxRank::query()
                        ->where(['member_id' => $value['share_id'],'date' => $date])
                        ->exists();
                    if(!$isStatic){
                        \App\Models\FaZxRank::query()->insert([
                            'member_id' => $value['share_id'],
                            'date' => $date,
                            'direct_active_count' => 1,
                            'team_active_count' => 1,
                            'createtime' => time(),
                        ]);
                        echo "新增激活LV1：".$value['share_id']."日期".$date."\r\n";
                    }else{
                        \App\Models\FaZxRank::query()
                            ->where(['member_id' => $value['share_id'],'date' => $date])
                            ->increment('direct_active_count');
                        \App\Models\FaZxRank::query()
                            ->where(['member_id' => $value['share_id'],'date' => $date])
                            ->increment('team_active_count');
                        echo "修改激活LV1：".$value['share_id']."日期".$date."\r\n";
                    }
                    if($value['share_id2'] > 0){ //团队人数 + 1
                        $isStatic = \App\Models\FaZxRank::query()
                            ->where(['member_id' => $value['share_id2'],'date' => $date])
                            ->exists();
                        if(!$isStatic){
                            \App\Models\FaZxRank::query()->insert([
                                'member_id' => $value['share_id2'],
                                'date' => $date,
                                'team_active_count' => 1,
                                'createtime' => time(),
                            ]);
                            echo "新增激活LV2：".$value['share_id2']."日期".$date."\r\n";
                        }else{
                            \App\Models\FaZxRank::query()
                                ->where(['member_id' => $value['share_id2'],'date' => $date])
                                ->increment('team_active_count');
                            echo "修改激活LV2：".$value['share_id2']."日期".$date."\r\n";
                        }
                        if($value['share_id3'] > 0){ //团队人数 +1
                            $isStatic = \App\Models\FaZxRank::query()
                                ->where(['member_id' => $value['share_id3'],'date' => $date])
                                ->exists();
                            if(!$isStatic){
                                \App\Models\FaZxRank::query()->insert([
                                    'member_id' => $value['share_id3'],
                                    'date' => $date,
                                    'team_active_count' => 1,
                                    'createtime' => time(),
                                ]);
                                echo "新增激活LV3：".$value['share_id3']."日期".$date."\r\n";
                            }else{
                                \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $value['share_id3'],'date' => $date])
                                    ->increment('team_active_count');
                                echo "修改激活LV3：".$value['share_id3']."日期".$date."\r\n";
                            }
                        }
                    }
                    //需要增加伞下人数
                    $shareIds = explode('-',substr(substr($value['combination'], 0, -1),1));//线路上所有id
                    $shareRanks = \App\Models\FaZxRank::query()
                        ->select('member_id')
                        ->where(['date' => $date])
                        ->whereIn('member_id',$shareIds)
                        ->get()
                        ->pluck('member_id')
                        ->toArray();
                    $diffIds = array_diff($shareIds,$shareRanks);
                    $insertDate = [];
                    if(!empty($diffIds)){
                        foreach ($diffIds as $diffId){
                            $insertDate[] = [
                                'member_id' => $diffId,
                                'date' => $date,
                                'createtime' => time(),
                            ];
                        }
                        \App\Models\FaZxRank::query()->insert($insertDate);
                    }
                    \App\Models\FaZxRank::query()
                        ->where(['date' => $date])
                        ->whereIn('member_id',$shareIds)
                        ->increment('total_active_count');
                    \App\Models\FaRankActiveCount::query()->insert(['member_id' => $value['id']]);
                    echo '当前执行用户id'.$value['id'].'激活日期为'.$date."处理完成\r\n";
                }
            }
        });
    //充值统计
    \App\Models\FaYlRecharge::query()->whereIn('status',[4,5])
        ->where('pay_time','>=',$startTime)
        ->where('pay_time','<=',$endTime)
        ->orderBy('pay_time')
        ->chunk(1000,function ($list){
            foreach ($list as $value){
                $date = \Carbon\Carbon::parse($value['pay_time'])->toDateString();
                $isChuli = \App\Models\FaRankRecharge::query()->where(['order_id' => $value['id']])->exists();
                if($isChuli){
                    echo '当前执行订单id'.$value['id'].'充值日期为'.$date."已处理\r\n";
                    continue;
                }
                $faYlMember = \App\Models\FaYlMember::query()
                    ->select('id','share_id','share_id2','share_id3','combination')
                    ->where(['id' => $value['member_id']])
                    ->first();
                if($faYlMember){
                    if($faYlMember['share_id'] > 0){  //有直推 团队人数+1
                        $isStatic = \App\Models\FaZxRank::query()
                            ->where(['member_id' => $faYlMember['share_id'],'date' => $date])
                            ->exists();
                        if(!$isStatic){
                            \App\Models\FaZxRank::query()->insert([
                                'member_id' => $faYlMember['share_id'],
                                'date' => $date,
                                'team_recharge' => $value['money'],
                                'createtime' => time(),
                            ]);
                            echo "新增充值LV1：".$faYlMember['share_id']."日期".$date."\r\n";
                        }else{
                            \App\Models\FaZxRank::query()
                                ->where(['member_id' => $faYlMember['share_id'],'date' => $date])
                                ->increment('team_recharge', $value['money']);
                            echo "修改充值LV1：".$faYlMember['share_id']."日期".$date."\r\n";
                        }
                        if($faYlMember['share_id2'] > 0){ //团队人数 + 1
                            $isStatic = \App\Models\FaZxRank::query()
                                ->where(['member_id' => $faYlMember['share_id2'],'date' => $date])
                                ->exists();
                            if(!$isStatic){
                                \App\Models\FaZxRank::query()->insert([
                                    'member_id' => $faYlMember['share_id2'],
                                    'date' => $date,
                                    'team_recharge' => $value['money'],
                                    'createtime' => time(),
                                ]);
                                echo "新增充值LV2：".$faYlMember['share_id2']."日期".$date."\r\n";
                            }else{
                                \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $faYlMember['share_id2'],'date' => $date])
                                    ->increment('team_recharge', $value['money']);
                                echo "修改充值LV2：".$faYlMember['share_id2']."日期".$date."\r\n";
                            }
                            if($faYlMember['share_id3'] > 0){ //团队人数 +1
                                $isStatic = \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $faYlMember['share_id3'],'date' => $date])
                                    ->exists();
                                if(!$isStatic){
                                    \App\Models\FaZxRank::query()->insert([
                                        'member_id' => $faYlMember['share_id3'],
                                        'date' => $date,
                                        'team_recharge' => $value['money'],
                                        'createtime' => time(),
                                    ]);
                                    echo "新增充值LV3：".$faYlMember['share_id3']."日期".$date."\r\n";
                                }else{
                                    \App\Models\FaZxRank::query()
                                        ->where(['member_id' => $faYlMember['share_id3'],'date' => $date])
                                        ->increment('team_recharge',$value['money']);
                                    echo "修改充值LV3：".$faYlMember['share_id3']."日期".$date."\r\n";
                                }
                            }
                        }
                        //需要增加伞下人数
                        $shareIds = explode('-',substr(substr($faYlMember['combination'], 0, -1),1));//线路上所有id
                        $shareRanks = \App\Models\FaZxRank::query()
                            ->select('member_id')
                            ->where(['date' => $date])
                            ->whereIn('member_id',$shareIds)
                            ->get()
                            ->pluck('member_id')
                            ->toArray();
                        $diffIds = array_diff($shareIds,$shareRanks);
                        $insertDate = [];
                        if(!empty($diffIds)){
                            foreach ($diffIds as $diffId){
                                $insertDate[] = [
                                    'member_id' => $diffId,
                                    'date' => $date,
                                    'createtime' => time(),
                                ];
                            }
                            \App\Models\FaZxRank::query()->insert($insertDate);
                        }
                        \App\Models\FaZxRank::query()
                            ->where(['date' => $date])
                            ->whereIn('member_id',$shareIds)
                            ->increment('total_recharge',$value['money']);
                        \App\Models\FaRankRecharge::query()->insert(['order_id' => $value['id']]);
                        echo '当前执行订单id'.$value['id'].'充值日期为'.$date."处理完成\r\n";
                    }
                }
            }
        });

    //提现统计
    \App\Models\FaYlWithdrawal::query()
        ->where(['status' => 4])
        ->where('complete_time','>=',$startTime)
        ->where('complete_time','<=',$endTime)
        ->orderBy('complete_time')
        ->chunk(1000,function ($list){
            foreach ($list as $value) {
                $date = \Carbon\Carbon::parse($value['complete_time'])->toDateString();
                $isChuli = \App\Models\FaRankWithdraw::query()->where(['order_id' => $value['id']])->exists();
                if($isChuli){
                    echo '当前执行订单id'.$value['id'].'提现日期为'.$date."已处理\r\n";
                    continue;
                }
                $faYlMember = \App\Models\FaYlMember::query()
                    ->select('id','share_id','share_id2','share_id3','combination')
                    ->where(['id' => $value['member_id']])
                    ->first();
                if ($faYlMember) {
                    if ($faYlMember['share_id'] > 0) {  //有直推 团队人数+1
                        $isStatic = \App\Models\FaZxRank::query()
                            ->where(['member_id' => $faYlMember['share_id'], 'date' => $date])
                            ->exists();
                        if (!$isStatic) {
                            \App\Models\FaZxRank::query()->insert([
                                'member_id' => $faYlMember['share_id'],
                                'date' => $date,
                                'team_withdraw' => $value['price'],
                                'createtime' => time(),
                            ]);
                            echo "新增提现LV1：".$faYlMember['share_id']."日期".$date."\r\n";
                        } else {
                            \App\Models\FaZxRank::query()
                                ->where(['member_id' => $faYlMember['share_id'], 'date' => $date])
                                ->increment('team_withdraw', $value['price']);
                            echo "修改提现LV1：".$faYlMember['share_id']."日期".$date."\r\n";
                        }
                        if ($faYlMember['share_id2'] > 0) { //团队人数 + 1
                            $isStatic = \App\Models\FaZxRank::query()
                                ->where(['member_id' => $faYlMember['share_id2'], 'date' => $date])
                                ->exists();
                            if (!$isStatic) {
                                \App\Models\FaZxRank::query()->insert([
                                    'member_id' => $faYlMember['share_id2'],
                                    'date' => $date,
                                    'team_withdraw' => $value['price'],
                                    'createtime' => time(),
                                ]);
                                echo "新增提现LV2：".$faYlMember['share_id2']."日期".$date."\r\n";
                            } else {
                                \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $faYlMember['share_id2'], 'date' => $date])
                                    ->increment('team_withdraw', $value['price']);
                                echo "修改提现LV2：".$faYlMember['share_id2']."日期".$date."\r\n";
                            }
                            if ($faYlMember['share_id3'] > 0) { //团队人数 +1
                                $isStatic = \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $faYlMember['share_id3'], 'date' => $date])
                                    ->exists();
                                if (!$isStatic) {
                                    \App\Models\FaZxRank::query()->insert([
                                        'member_id' => $faYlMember['share_id3'],
                                        'date' => $date,
                                        'team_withdraw' => $value['price'],
                                        'createtime' => time(),
                                    ]);
                                    echo "新增提现L3：".$faYlMember['share_id3']."日期".$date."\r\n";
                                } else {
                                    \App\Models\FaZxRank::query()
                                        ->where(['member_id' => $faYlMember['share_id3'], 'date' => $date])
                                        ->increment('team_withdraw', $value['price']);
                                    echo "修改提现L3：".$faYlMember['share_id3']."日期".$date."\r\n";
                                }
                            }
                        }
                        //需要增加伞下人数
                        $shareIds = explode('-', substr(substr($faYlMember['combination'], 0, -1), 1));//线路上所有id
                        $shareRanks = \App\Models\FaZxRank::query()
                            ->select('member_id')
                            ->where(['date' => $date])
                            ->whereIn('member_id', $shareIds)
                            ->get()
                            ->pluck('member_id')
                            ->toArray();
                        $diffIds = array_diff($shareIds, $shareRanks);
                        $insertDate = [];
                        if (!empty($diffIds)) {
                            foreach ($diffIds as $diffId) {
                                $insertDate[] = [
                                    'member_id' => $diffId,
                                    'date' => $date,
                                    'createtime' => time(),
                                ];
                            }
                            \App\Models\FaZxRank::query()->insert($insertDate);
                        }
                        \App\Models\FaZxRank::query()
                            ->where(['date' => $date])
                            ->whereIn('member_id', $shareIds)
                            ->increment('total_withdraw', $value['price']);

                        \App\Models\FaRankWithdraw::query()->insert(['order_id' => $value['id']]);
                        echo '当前执行订单id'.$value['id'].'提现日期为'.$date."处理完成\r\n";
                    }
                }
            }
        });

});

//激活人数
Artisan::command('test:active',function (){
    \App\Models\ FaYlInviteLog::query()->update(['total_active_count' => 0]);
    \App\Models\FaYlInviteLog::query()->chunk(1000,function ($list){
        foreach ($list as $value){
            $toMemberId = $value->to_member_id;
            $member = \App\Models\FaYlMember::query()->where(['id' => $toMemberId])->first();
            if($member['is_active'] == 1){
                //增加 新的
                if($member['combination']){
                    $shareIds = explode('-',substr(substr($member['combination'], 0, -1),1));
                    if(!empty($shareIds)){
                        \App\Models\FaYlInviteLog::query()->whereIn('to_member_id',$shareIds)->increment('total_active_count');
                    }
                }
            }
        }
    });
});

//test-Redis
Artisan::command('test:redis',function (){
    $keys = \Illuminate\Support\Facades\Redis::connection('cache')->keys('laravel_cache:user_token:*');
    foreach ($keys as $key){
        echo '删除缓存'.$key."\r\n";
        \Illuminate\Support\Facades\Redis::connection('cache')->del($key);
    }
    dd(111);
    //$redis = \Illuminate\Support\Facades\Redis::connection('user');
    //$redis->set('key', 'value');
    //$res = $redis->get('key');
    //$redis->setex('key',10, json_encode([1,3],true));
    //$redis->del('key');
    //$res = $redis->exists('key');
    //dd($res);
   /* \App\Models\FaYlMember::query()->chunk(1000,function ($list){
        foreach ($list as $data){
            $key = \App\Constants\RedisKeys::USER_TOKEN.$data->token;
            if(\Illuminate\Support\Facades\Cache::has($key)){
                \Illuminate\Support\Facades\Cache::forget($key);
                echo "删除redistoken缓存：".$data->token."\r\n";
            }
        }
    });*/
});

//test-Redis-queue
Artisan::command('test:redis:queue',function (){
    for($i=0;$i<20;$i++){
        $data = [
            'meeting_id' => 11,
            //'member_id' => 38471,
            'reward_wallet' => 'new',
            'reward_amount' => '3.4',
        ];
       // \Illuminate\Support\Facades\Redis::lpush('your_queue_key', $data);
       // $totalItems = \Illuminate\Support\Facades\Redis::llen('your_queue_key'); // 获取队列中总的项目数
        //\App\Jobs\MeetingRewardJob::dispatch($totalItems);
        $job = new \App\Jobs\MeetingRewardJob($data);
        $job->onConnection('redis')->onQueue('meeting:reward');
        dispatch($job);
    }
});

//签到数据修复
Artisan::command('test:sign:log',function (){
    \App\Models\FaYlMember::query()->chunk(1000,function ($list){
        foreach ($list as $value){
            echo "处理用户id".$value['id']."\r\n";
            $signList = \App\Models\FaYlSignLog::query()->where(['member_id' => $value['id']])->orderBy('createdate')->get()->toArray();
            $last_lxcnt = 0;
            $createDate = '';
            foreach ($signList as $data){
                if($data['last_lxcnt'] == $last_lxcnt){ //数据有问题
                    //判断日期 是否连续七日
                    $yesterday = \Carbon\Carbon::parse(date('Y-m-d',strtotime($data['createdate'])))->subDay()->format('Ymd');
                    if($yesterday == $createDate){ //数据有问题
                        writeLog('test_sign_log',['用户id'=>$value['id'],'用户账号'=>$value['phone'],'错误日期1'=>$yesterday,'错误日期2'=>$data['createdate']]);
                
                    }
                }
                echo "处理用户id".$value['id']."日期".$data['createdate']."连续签到天数".$data['last_lxcnt']."\r\n";
                $createDate = $data['createdate'];
                $last_lxcnt = $data['last_lxcnt'];
            }
        }
    });
});


//签到数据修复
Artisan::command('test:sign:log1',function (){
    \App\Models\FaYlMember::query()->chunk(1000,function ($list){
        foreach ($list as $value){
            echo "处理用户id".$value['id']."\r\n";
            $sign = \App\Models\FaYlSignLog::query()->where(['member_id' => $value['id']])->orderByDesc('createdate')->first();
            $last_lxcnt = 0;
            $isLx = true;
            if($sign){
                $last_lxcnt = $sign['last_lxcnt'];
                //最后一天签到日期
                $lastSignDate = $sign['createdate'];
                $yesterdayDate = \Carbon\Carbon::now()->subDay()->format('Ymd');
                $todayDate = \Carbon\Carbon::now()->format('Ymd');
                if($yesterdayDate != $lastSignDate && $todayDate != $lastSignDate){ //断签数据不管
                    $last_lxcnt = 0;
                    $isLx = false;
                }
            }
            if($isLx && $value['sign_lxcnt'] != $last_lxcnt){
                writeLog('test_sign_log',['用户id'=>$value['id'],'用户账号'=>$value['phone'],'用户里连续签到日期'=>$value['sign_lxcnt'],'记录表连续签到日期'=>$last_lxcnt]);
            }
        }
    });
});

//修复利息问题
Artisan::command('test:sign:rate',function (){
    \App\Models\FaYlMember::query()->chunk(1000,function ($list){
        $rate = '3.01';
        foreach ($list as $value){
            echo "处理用户id".$value['id']."\r\n";
            $signList = \App\Models\FaYlSignLog::query()->where(['member_id' => $value['id']])->orderBy('createtime')->get()->toArray();
            $times = 0; //发放利息次数
            $buQian = 0; //补签次数
            //用户获得居民补贴款时间
            $faYlPriceLog = \App\Models\FaYlPriceLog::query()->where(['member_id' => $value['id'],'money_type' => 'perk'])->orderBy('createtime')->first();
            if($faYlPriceLog){
                foreach ($signList as $data){
                    if($data['is_buqian'] == 0){ //正常签到
                        //判断是否需要发放利息
                        //签到日期
                        $signTotal = \Carbon\Carbon::parse(date('Y-m-d',strtotime($data['createdate'])))->diffInDays(\Carbon\Carbon::parse($value['create_time'])->startOfDay());
                        //连续签到次数 签到时间点
                        $signLxCnt = \App\Models\FaYlSignLog::query()
                            ->where(['member_id' => $value['id']])
                            ->where('createtime','<=',strtotime($data['createtime']))
                            ->count();
                        if($signLxCnt >= ($signTotal + 1)){//说明可以领取
                            //需要判断是否获得了居民补贴款 perk
                            if(strtotime($faYlPriceLog['createtime']) <= strtotime($data['createtime'])){
                                $times = $times + 1;
                            }
                        }
                    }else{ //补签数据
                        if($data['is_admin'] == 0){ //前台补签 必须给利息
                            //需要判断是否获得了居民补贴款 perk
                            if(strtotime($faYlPriceLog['createtime']) <= strtotime($data['createtime'])){
                                $times = $times + 1;
                                $buQian = $buQian + 1;
                            }
                        }
                    }
                }
                $totalRate = $times * $rate;
                $totalRate = round($totalRate,2);
                //查询用户钱包
                $faYlPriceMember = \App\Models\FaYlPriceMember::query()->select('rate_price','perk_price')->where(['member_id' => $value['id']])->first();
                if($totalRate != $faYlPriceMember['rate_price']){
                    if($faYlPriceMember['rate_price'] > $totalRate){
                        writeLog('test_rate_1_log',['用户id'=>$value['id'],'用户账号'=>$value['phone'],'利息总次数' => $times,'补签次数'=>$buQian,'应得利息'=>$totalRate,'现有利息'=>$faYlPriceMember['rate_price'],'居民补贴款'=>$faYlPriceMember['perk_price']]);
                    }else{
                        writeLog('test_rate_log',['用户id'=>$value['id'],'用户账号'=>$value['phone'],'利息总次数' => $times,'补签次数'=>$buQian,'应得利息'=>$totalRate,'现有利息'=>$faYlPriceMember['rate_price'],'居民补贴款'=>$faYlPriceMember['perk_price']]);
                    }
                }
            }

        }
    });
});


//职务数据修复数据修复
Artisan::command('test:position',function (){
    //职务管理  邀请人数 --- 激活人数
    $positions = \App\Models\FaZxPosition::query()->orderBy('order')->get();
    \App\Models\FaYlMember::query()->chunk(1000,function ($list) use ($positions){
        foreach ($list as $member){
            //计算当前用户三级人数
            $activeCount = \App\Models\FaYlMember::query()
                ->where(['is_active' => 1,'is_auth' => 1])
                ->where(function ($query) use ($member){
                    $query->where('share_id','=',$member['id'])
                        ->orWhere('share_id2','=',$member['id'])
                        ->orWhere('share_id3','=',$member['id']);
                })->count();
            echo '正在执行用户id'.$member['id'].$member['realname']."团队激活人数为".$activeCount."\r\n";
            if($activeCount > 30){
                $positionWeight = \App\Models\FaZxPosition::query()->where(['id' => $member['position_level']])->value('order');
                foreach ($positions as $item) {
                    // 一级用户 第一次完成任务
                    if($activeCount >= $item['active_people'] && $item['id'] != $member['position_level'] && $item['order'] >= $positionWeight){
                        //工资发放情况
                        $money = \App\Models\FaYlPriceLog::query()->where(['type' => \App\Models\FaYlPriceLog::TYPE_POSITION_SALARY])->value('money');
                        $buFa = $item['salary'] - $money;
                        //修改用户完成情况
                        $message = $member['id'].$member['realname'].'升级会员'.$item['name'].'需要发放工资'.$item['salary'].'已发放工资'.$money.'还欠工资'.$buFa;
                        writeLog('test_position_log',['message' => $message]);
                        echo $message."\r\n";
                        //\App\Models\FaYlMember::query()->where(['id' => $member['id']])->update(['position_level' => $item['id']]);

                        //\App\Models\FaYlMember::addBalance($item['issue_wallet'], $buFa, $member['id'], \App\Models\FaYlPriceLog::TYPE_POSITION_SALARY, "{$item['name']}职务工资补发", $item['id']);
                    }
                }
            }
        }
    });
});


//职务数据修复数据修复
Artisan::command('test:position1',function (){
    //职务管理  邀请人数 --- 激活人数
    //$positions = \App\Models\FaZxPosition::query()->orderBy('order')->get();
    \App\Models\FaYlMember::query()->where('position_level','>',0)->chunk(1000,function ($list){
        foreach ($list as $member){
            //当前职位
            $position = \App\Models\FaZxPosition::query()->where(['id' => $member['position_level']])->first();
             if($position){
                //工资发放情况
                $money = \App\Models\FaYlPriceLog::query()->where(['type' => \App\Models\FaYlPriceLog::TYPE_POSITION_SALARY,'member_id' => $member['id']])->sum('money');
                $salary = $position['salary'];
                if($member['is_double'] == 1){
                    $salary = $position['salary'] * 2;
                }
                $buFa = $salary- $money;
                //修改用户完成情况
               if($buFa > 0){
                   $message = $member['id'].'手机号'.$member['phone'].$member['realname'].'当前职位'.$position['name'].'需要发放工资'.$salary.'已发放工资'.$money.'还欠工资'.$buFa;
                   writeLog('test_position_log',['message' => $message]);
                   echo $message."\r\n";
                     \App\Models\FaYlMember::addBalance($position['issue_wallet'], $buFa, $member['id'], \App\Models\FaYlPriceLog::TYPE_POSITION_SALARY, "{$position['name']}职务工资补发", $position['id']);
               }
            }
        }
    });
});

//用户充值金额统计修复
Artisan::command('test:leiji',function (){
   /* \App\Models\FaYlMember::query()->chunk(1000,function ($list){
        foreach ($list as $value){
            $price = \App\Models\FaYlRecharge::query()->where(['member_id' => $value['id'],'status' => 4])->where('type','!=',9)->sum('read_price');
            if($price > 0){
                echo $value['id'].$value['realname']."账号".$value['phone']."总充值金额".$price."\r\n";
                \App\Models\FaYlPriceMember::query()->where(['member_id' => $value['id']])->update(['recharge_leiji' => $price]);
            }
        }
    });*/
    
   \App\Models\FaYlPriceMember::query()->update(['recharge_leiji' => 0]);
    \App\Models\FaZxRank::query()->update(['team_recharge' => 0,'total_recharge' => 0]);
    \App\Models\FaYlRecharge::query()
        ->where(['status' => 4])->chunk(1000,function ($list){
            foreach ($list as $value){
                echo $value['id'].'金额'.$value['read_price'].'用户id'.$value['member_id']."\r\n";
                //\App\Models\FaYlPriceMember::query()->where(['member_id' => $value['member_id']])->increment('recharge_leiji', $value['read_price']);
                //排行榜统计
                $faYlMember = \App\Models\FaYlMember::query()
                    ->select('id','share_id','share_id2','share_id3','combination')
                    ->where(['id' => $value['member_id']])
                    ->first();
                //增加用户充值
                \App\Models\FaYlPriceMember::query()->where(['member_id' => $value['member_id']])->increment('recharge_leiji',$value['read_price']);
                if($faYlMember){
                    if($faYlMember['share_id'] > 0){  //有直推 团队人数+1
                        $date =  \Carbon\Carbon::parse($value['pay_time'])->toDateString();
                       // dd($date);
                        $isStatic = \App\Models\FaZxRank::query()
                            ->where(['member_id' => $faYlMember['share_id'],'date' => $date])
                            ->exists();
                        if(!$isStatic){
                            \App\Models\FaZxRank::query()->insert([
                                'member_id' => $faYlMember['share_id'],
                                'date' => $date,
                                'team_recharge' => $value['read_price'],
                                'createtime' => time(),
                            ]);
                        }else{
                            \App\Models\FaZxRank::query()
                                ->where(['member_id' => $faYlMember['share_id'],'date' => $date])
                                ->increment('team_recharge', $value['read_price']);
                        }
                        if($faYlMember['share_id2'] > 0){ //团队人数 + 1
                            $isStatic = \App\Models\FaZxRank::query()
                                ->where(['member_id' => $faYlMember['share_id2'],'date' => $date])
                                ->exists();
                            if(!$isStatic){
                                \App\Models\FaZxRank::query()->insert([
                                    'member_id' => $faYlMember['share_id2'],
                                    'date' => $date,
                                    'team_recharge' => $value['read_price'],
                                    'createtime' => time(),
                                ]);
                            }else{
                                \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $faYlMember['share_id2'],'date' => $date])
                                    ->increment('team_recharge', $value['read_price']);
                            }
                            if($faYlMember['share_id3'] > 0){ //团队人数 +1
                                $isStatic = \App\Models\FaZxRank::query()
                                    ->where(['member_id' => $faYlMember['share_id3'],'date' => $date])
                                    ->exists();
                                if(!$isStatic){
                                    \App\Models\FaZxRank::query()->insert([
                                        'member_id' => $faYlMember['share_id3'],
                                        'date' => $date,
                                        'team_recharge' => $value['read_price'],
                                        'createtime' => time(),
                                    ]);
                                }else{
                                    \App\Models\FaZxRank::query()
                                        ->where(['member_id' => $faYlMember['share_id3'],'date' => $date])
                                        ->increment('team_recharge',$value['read_price']);
                                }
                            }
                        }
                        //需要增加伞下人数
                        $shareIds = explode('-',substr(substr($faYlMember['combination'], 0, -1),1));//线路上所有id
                        $shareRanks = \App\Models\FaZxRank::query()
                            ->select('member_id')
                            ->where(['date' => $date])
                            ->whereIn('member_id',$shareIds)
                            ->get()
                            ->pluck('member_id')
                            ->toArray();
                        $diffIds = array_diff($shareIds,$shareRanks);
                        $insertDate = [];
                        if(!empty($diffIds)){
                            foreach ($diffIds as $diffId){
                                $insertDate[] = [
                                    'member_id' => $diffId,
                                    'date' => $date,
                                    'createtime' => time(),
                                ];
                            }
                            \App\Models\FaZxRank::query()->insert($insertDate);
                        }
                        \App\Models\FaZxRank::query()
                            ->where(['date' => $date])
                            ->whereIn('member_id',$shareIds)
                            ->increment('total_recharge',$value['read_price']);
                    }
                }
            }
        });

});

