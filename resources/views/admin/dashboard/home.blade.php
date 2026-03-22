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
    .card-static{
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
        margin-bottom: 1.5rem;
        border-radius: .25rem;
    }
</style>

<div class="dashboard-title">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card-static bg-lake-blue">
                    <div>今日注册会员数</div>
                    <div class="data-num" id="today_member_count{{$isInside}}">0</div>
                    <div>注册总会员数</div>
                    <div class="data-num" id="total_member_count{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-lake-blue">
                    <div>今日提现金额</div>
                    <div class="data-num" id="today_withdraw_money{{$isInside}}">0</div>
                    <div>提现总金额</div>
                    <div class="data-num" id="total_withdraw_money{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-lake-blue">
                    <div>今日提现总次数</div>
                    <div class="data-num" id="today_withdraw_num{{$isInside}}">0</div>
                    <div>提现总次数</div>
                    <div class="data-num" id="total_withdraw_num{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-lake-blue">
                    <div>总充值余额</div>
                    <div class="data-num" id="total_recharge_price{{$isInside}}">0</div>
                    <div>总项目收益</div>
                    <div class="data-num" id="total_licai_price{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-lake-blue">
                    <div>审计费缴纳总人数</div>
                    <div class="data-num" id="shen_ji_count{{$isInside}}">0</div>
                    <div>审计费缴纳总金额</div>
                    <div class="data-num" id="shen_ji_money{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-lake-blue">
                    <div>登记提现手续费总人数</div>
                    <div class="data-num" id="with_three_sxf_total{{$isInside}}">0</div>
                    <div>登记提现手续费总金额</div>
                    <div class="data-num" id="with_three_sxf_money{{$isInside}}">0</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-static bg-green">
                    <div>今日激活会员数</div>
                    <div class="data-num" id="active_today{{$isInside}}">0</div>
                    <div>激活总会员数</div>
                    <div class="data-num" id="active_total{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-green">
                    <div>今日充值人数</div>
                    <div class="data-num" id="today_recharge_number{{$isInside}}">0</div>
                    <div>充值总人数</div>
                    <div class="data-num" id="recharge_cnt{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-green">
                    <div>今日充提差</div>
                    <div class="data-num" id="today_ti_cha{{$isInside}}">0</div>
                    <div>总充提差</div>
                    <div class="data-num" id="total_ti_cha{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-green">
                    <div>总团队奖励</div>
                    <div class="data-num" id="total_team_price{{$isInside}}">0</div>
                    <div>总同启小康补助款</div>
                    <div class="data-num" id="total_jintie_price{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-green">
                    <div>大额协议保证金总人数</div>
                    <div class="data-num" id="bao_zhen_count{{$isInside}}">0</div>
                    <div>大额协议保证金总金额</div>
                    <div class="data-num" id="bao_zhen_money{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-green">
                    <div>签署合同总人数/缴纳总人数</div>
                    <div class="data-num"><span id="with_four_total{{$isInside}}">0</span>/<span id="with_four_jn_total{{$isInside}}">0</span></div>
                    <div>缴纳总金额</div>
                    <div class="data-num" id="with_four_jn_money{{$isInside}}">0</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-static bg-orange">
                    <div>今日投资金额</div>
                    <div class="data-num" id="tou_zi_today{{$isInside}}">0</div>
                    <div>总投资金额</div>
                    <div class="data-num" id="tou_zi_total{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-orange">
                    <div>今日提现人数</div>
                    <div class="data-num" id="today_withdraw_cnt{{$isInside}}">0</div>
                    <div>提现总人数</div>
                    <div class="data-num" id="total_withdraw_cnt{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-orange">
                    <div>今日首充人数</div>
                    <div class="data-num" id="shou_recharge_number{{$isInside}}">0</div>
                    <div>今日首充金额</div>
                    <div class="data-num" id="shou_rechargee_money{{$isInside}}"></div>
                </div>
                <div class="card-static bg-orange">
                    <div>总宣传共赴津贴</div>
                    <div class="data-num" id="total_card_price{{$isInside}}">0</div>
                    <div>总冻结余额</div>
                    <div class="data-num" id="total_frozen_price{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-orange">
                    <div>登记总人数</div>
                    <div class="data-num" id="with_three_total{{$isInside}}">0</div>
                    <div></div>
                    <div class="data-num"></div>
                </div>
                <div class="card-static bg-orange">
                    <div>贷款缴纳总人数</div>
                    <div class="data-num" id="with_five_jn_total{{$isInside}}">0</div>
                    <div>贷款缴纳总金额</div>
                    <div class="data-num" id="with_five_jn_money{{$isInside}}">0</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-static bg-bright-red">
                    <div>今日充值金额</div>
                    <div class="data-num" id="today_recharge_money{{$isInside}}"></div>
                    <div>充值总金额</div>
                    <div class="data-num" id="recharge_money{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-bright-red">
                    <div>今日充值总次数</div>
                    <div class="data-num" id="today_recharge_num{{$isInside}}">0</div>
                    <div>充值总次数</div>
                    <div class="data-num" id="recharge_num{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-bright-red">
                    <div>今日捐款金额</div>
                    <div class="data-num" id="juan_today{{$isInside}}">0</div>
                    <div>总捐款金额</div>
                    <div class="data-num" id="juan_total{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-bright-red">
                    <div>当日签到人数</div>
                    <div class="data-num" id="sign_today{{$isInside}}">0</div>
                    <div>总签到人数</div>
                    <div class="data-num" id="sign_total{{$isInside}}">0</div>
                </div>
                <div class="card-static bg-bright-red">
                    <div>登记缴纳总人数</div>
                    <div class="data-num" id="with_three_jn_total{{$isInside}}">0</div>
                    <div>登记缴纳总金额</div>
                    <div class="data-num" id="with_three_jn_money{{$isInside}}">0</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Dcat.ready(function() {
        console.log({{$isInside}})
        $.ajax({
            url: '{{ admin_url('/list?is_inside='.$isInside) }}',
            type: 'POST',
            data: {
                _token: Dcat.token,
                action: 'initial_load'
            },
            beforeSend: function() {
                Dcat.loading();
            },
            complete: function() {
                Dcat.loading(false);
            },
            success: function(response) {
                console.log(response.data.today_recharge_money);
                $('#today_member_count{{$isInside}}').html(response.data.today_member_count);
                $('#total_member_count{{$isInside}}').html(response.data.total_member_count);
                $('#today_withdraw_money{{$isInside}}').html(response.data.today_withdraw_money);
                $('#total_withdraw_money{{$isInside}}').html(response.data.total_withdraw_money);
                $('#today_withdraw_num{{$isInside}}').html(response.data.today_withdraw_num);
                $('#total_withdraw_num{{$isInside}}').html(response.data.total_withdraw_num);
                $('#total_recharge_price{{$isInside}}').html(response.data.total_recharge_price);
                $('#total_licai_price{{$isInside}}').html(response.data.total_licai_price);
                $('#shen_ji_count{{$isInside}}').html(response.data.shen_ji_count);
                $('#shen_ji_money{{$isInside}}').html(response.data.shen_ji_money);
                $('#with_three_sxf_total{{$isInside}}').html(response.data.with_three_sxf_total);
                $('#with_three_sxf_money{{$isInside}}').html(response.data.with_three_sxf_money);
                $('#active_today{{$isInside}}').html(response.data.active_today);
                $('#active_total{{$isInside}}').html(response.data.active_total);
                $('#today_recharge_number{{$isInside}}').html(response.data.today_recharge_number);
                $('#recharge_cnt{{$isInside}}').html(response.data.recharge_cnt);
                $('#today_ti_cha{{$isInside}}').html(response.data.today_ti_cha);
                $('#total_ti_cha{{$isInside}}').html(response.data.total_ti_cha);
                $('#total_team_price{{$isInside}}').html(response.data.total_team_price);
                $('#total_jintie_price{{$isInside}}').html(response.data.total_jintie_price);
                $('#bao_zhen_count{{$isInside}}').html(response.data.bao_zhen_count);
                $('#bao_zhen_money{{$isInside}}').html(response.data.bao_zhen_money);
                $('#with_four_total{{$isInside}}').html(response.data.with_four_total);
                $('#with_four_jn_total{{$isInside}}').html(response.data.with_four_jn_total);
                $('#with_four_jn_money{{$isInside}}').html(response.data.with_four_jn_money);
                $('#tou_zi_today{{$isInside}}').html(response.data.tou_zi_today);
                $('#tou_zi_total{{$isInside}}').html(response.data.tou_zi_total);
                $('#today_withdraw_cnt{{$isInside}}').html(response.data.today_withdraw_cnt);
                $('#total_withdraw_cnt{{$isInside}}').html(response.data.total_withdraw_cnt);
                $('#shou_recharge_number{{$isInside}}').html(response.data.shou_recharge_number);
                $('#shou_rechargee_money{{$isInside}}').html(response.data.shou_rechargee_money);
                
                $('#total_card_price{{$isInside}}').html(response.data.total_card_price);
                $('#total_frozen_price{{$isInside}}').html(response.data.total_frozen_price);
                $('#with_three_total{{$isInside}}').html(response.data.with_three_total);
                $('#with_five_jn_total{{$isInside}}').html(response.data.with_five_jn_total);
                $('#with_five_jn_money{{$isInside}}').html(response.data.with_five_jn_money);
                $('#today_recharge_money{{$isInside}}').html(response.data.today_recharge_money);
                $('#recharge_money{{$isInside}}').html(response.data.recharge_money);
                $('#today_recharge_num{{$isInside}}').html(response.data.today_recharge_num);
                $('#recharge_num{{$isInside}}').html(response.data.recharge_num);
                $('#juan_today{{$isInside}}').html(response.data.juan_today);
                $('#juan_total{{$isInside}}').html(response.data.juan_total);
                $('#sign_today{{$isInside}}').html(response.data.sign_today);
                $('#sign_total{{$isInside}}').html(response.data.sign_total);
                $('#with_three_jn_total{{$isInside}}').html(response.data.with_three_jn_total);
                $('#with_three_jn_money{{$isInside}}').html(response.data.with_three_jn_money);
            },
            error: function(xhr) {
                Dcat.handleAjaxError(xhr);
            }
        });
    });
</script>
