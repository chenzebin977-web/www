<style>
    .dashboard-title .links {
        text-align: center;
        margin-bottom: 2.5rem;
    }
    .dashboard-title .links > a {
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        color: #fff;
    }
    .dashboard-title h1 {
        font-weight: 200;
        font-size: 2.5rem;
    }
    .dashboard-title .avatar {
        background: #fff;
        border: 2px solid #fff;
        width: 70px;
        height: 70px;
    }
    .bg-lake-blue{
        font-size: 14px;
        padding: 15px 20px 0 20px;
        color: #ffffff;
        background: #00c0ef;
        min-height: 153px;
    }
    .bg-green{font-size: 14px;
        padding: 15px 20px 0 20px;
        color: #ffffff;
        background: #00a65a;
        min-height: 153px;
    }
    .bg-orange{
        font-size: 14px;
        padding: 15px 20px 0 20px;
        color: #ffffff !important;
        background: #f39c11;
        min-height: 153px;
    }
    .bg-bright-red{
        font-size: 14px;
        padding: 15px 20px 0 20px;
        color: #ffffff;
        background: #dd4c39;
        min-height: 153px;
    }
    .data-num{
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }
</style>

<div class="dashboard-title">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-lake-blue">
                    <div>今日注册会员数</div>
                    <div class="data-num">{{$data['today_member_count']}}</div>
                    <div>注册总会员数</div>
                    <div class="data-num">{{$data['total_member_count']}}</div>
                </div>
                <div class="card bg-lake-blue">
                    <div>今日提现金额</div>
                    <div class="data-num">{{$data['today_withdraw_money']}}</div>
                    <div>提现总金额</div>
                    <div class="data-num">{{$data['total_withdraw_money']}}</div>
                </div>
                <div class="card bg-lake-blue">
                    <div>今日提现总次数</div>
                    <div class="data-num">{{$data['today_withdraw_num']}}</div>
                    <div>提现总次数</div>
                    <div class="data-num">{{$data['total_withdraw_num']}}</div>
                </div>
                <div class="card bg-lake-blue">
                    <div>总充值余额</div>
                    <div class="data-num">{{$data['total_recharge_price']}}</div>
                    <div>总项目收益</div>
                    <div class="data-num">{{$data['total_licai_price']}}</div>
                </div>
                <div class="card bg-lake-blue">
                    <div>审计费缴纳总人数</div>
                    <div class="data-num">{{$data['shen_ji_count']}}</div>
                    <div>审计费缴纳总金额</div>
                    <div class="data-num">{{$data['shen_ji_money']}}</div>
                </div>
                <div class="card bg-lake-blue">
                    <div>登记提现手续费总人数</div>
                    <div class="data-num">{{$data['with_three_sxf_total']}}</div>
                    <div>登记提现手续费总金额</div>
                    <div class="data-num">{{$data['with_three_sxf_money']}}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-green">
                    <div>今日激活会员数</div>
                    <div class="data-num">{{$data['active_today']}}</div>
                    <div>激活总会员数</div>
                    <div class="data-num">{{$data['active_total']}}</div>
                </div>
                <div class="card bg-green">
                    <div>今日充值人数</div>
                    <div class="data-num">{{$data['today_recharge_number']}}</div>
                    <div>充值总人数</div>
                    <div class="data-num">{{$data['recharge_cnt']}}</div>
                </div>
                <div class="card bg-green">
                    <div>今日充提差</div>
                    <div class="data-num">{{$data['today_ti_cha']}}</div>
                    <div>总充提差</div>
                    <div class="data-num">{{$data['total_ti_cha']}}</div>
                </div>
                <div class="card bg-green">
                    <div>总团队奖励</div>
                    <div class="data-num">{{$data['bao_zhen_count']}}</div>
                    <div>总同启小康补助款</div>
                    <div class="data-num">{{$data['bao_zhen_count']}}</div>
                </div>
                <div class="card bg-green">
                    <div>大额协议保证金总人数</div>
                    <div class="data-num">{{$data['bao_zhen_count']}}</div>
                    <div>大额协议保证金总金额</div>
                    <div class="data-num">{{$data['bao_zhen_money']}}</div>
                </div>
                <div class="card bg-green">
                    <div>签署合同总人数/缴纳总人数</div>
                    <div class="data-num">{{ $data['with_four_total']}}/{{$data['with_four_jn_total']}}</div>
                    <div>缴纳总金额</div>
                    <div class="data-num">{{$data['with_four_jn_money']}}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-orange">
                    <div>今日投资金额</div>
                    <div class="data-num">{{$data['tou_zi_today']}}</div>
                    <div>总投资金额</div>
                    <div class="data-num">{{$data['tou_zi_total']}}</div>
                </div>
                <div class="card bg-orange">
                    <div>今日提现人数</div>
                    <div class="data-num">{{$data['today_withdraw_cnt']}}</div>
                    <div>提现总人数</div>
                    <div class="data-num">{{$data['total_withdraw_cnt']}}</div>
                </div>
                <div class="card bg-orange">
                    <div>今日首充人数</div>
                    <div class="data-num">{{$data['shou_recharge_number']}}</div>
                    <div>今日首充金额</div>
                    <div class="data-num">{{$data['today_recharge_money']}}</div>
                </div>
                <div class="card bg-orange">
                    <div>总宣传共赴津贴</div>
                    <div class="data-num">{{$data['total_card_price']}}</div>
                    <div>总冻结余额</div>
                    <div class="data-num">{{$data['total_frozen_price']}}</div>
                </div>
                <div class="card bg-orange">
                    <div>登记总人数</div>
                    <div class="data-num">{{$data['with_three_total']}}</div>
                    <div></div>
                    <div class="data-num"></div>
                </div>
                <div class="card bg-orange">
                    <div>贷款缴纳总人数</div>
                    <div class="data-num">{{$data['with_five_jn_total']}}</div>
                    <div>贷款缴纳总金额</div>
                    <div class="data-num">{{$data['with_five_jn_money']}}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-bright-red">
                    <div>今日充值金额</div>
                    <div class="data-num">{{$data['today_recharge_money']}}</div>
                    <div>充值总金额</div>
                    <div class="data-num">{{$data['recharge_money']}}</div>
                </div>
                <div class="card bg-bright-red">
                    <div>今日充值总次数</div>
                    <div class="data-num">{{ $data['today_recharge_num']}}</div>
                    <div>充值总次数</div>
                    <div class="data-num">{{$data['recharge_num']}}</div>
                </div>
                <div class="card bg-bright-red">
                    <div>今日捐款金额</div>
                    <div class="data-num">{{$data['juan_today']}}</div>
                    <div>总捐款金额</div>
                    <div class="data-num">{{$data['juan_total']}}</div>
                </div>
                <div class="card bg-bright-red">
                    <div>当日签到人数</div>
                    <div class="data-num">{{$data['sign_today']}}</div>
                    <div>总签到人数</div>
                    <div class="data-num">{{$data['sign_total']}}</div>
                </div>
                <div class="card bg-bright-red">
                    <div>登记缴纳总人数</div>
                    <div class="data-num">{{$data['with_three_jn_total']}}</div>
                    <div>登记缴纳总金额</div>
                    <div class="data-num">{{$data['with_three_jn_money']}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<script>
    console.log({{$isInside}})
</script>--}}
