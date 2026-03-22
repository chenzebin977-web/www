<div>
    <div id="team-size-table-1">{!! $table1 !!}</div>
    <div id="team-size-table-2">{!! $table2 !!}</div>
    <div id="team-size-grid-table">{!! $grid !!}</div>
</div>

<style>
    .top-table .box-footer{
        display: none;
    }
</style>

<script>
    console.log('{{ $tabId }}')
    //点击按钮
    $("#{{ $tabId }}").find(".team_detail").on("click",function (){
        let url = $(this).attr('data-url')
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                Dcat.loading();
            },
            complete: function() {
                Dcat.loading(false);
            },
            success: function(response) {
                $("#{{ $tabId }}").find('.async-table').html(response)
                init()
            },
            error: function(xhr) {
                Dcat.handleAjaxError(xhr);
            }
        })
    })
    //筛选打开关闭事件
    function changeFilter(){
        $("#{{ $tabId }}").find(".btn-group.filter-button-group.dropdown").on("click",function (){
            let className = $(this).parents('.custom-data-table-header').siblings('.filter-box.card.p-2').attr('class')
            if(className.includes('d-none')){
                $(this).parents('.dcat-box.custom-data-table.dt-bootstrap4').find('.filter-box.card.p-2').removeClass('d-none')
            }else{
                $(this).parents('.dcat-box.custom-data-table.dt-bootstrap4').find('.filter-box.card.p-2').addClass('d-none')
            }
        })
    }
    //重写刷新按钮
    refresh()
    function refresh(){
        $("#{{ $tabId }}").find(".btn.btn-primary.grid-refresh.btn-mini.btn-outline").on("click",function (){
            let url = $(this).parents('.async-table').attr('data-url')
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    Dcat.loading();
                },
                complete: function() {
                    Dcat.loading(false);
                },
                success: function(response) {
                    $("#{{ $tabId }}").find('.async-table').html(response)
                    init()
                },
                error: function(xhr) {
                    Dcat.handleAjaxError(xhr);
                }
            })
        })
    }
    //重写搜索
    function search(){
        $("#{{ $tabId }}").find(".btn.btn-primary.btn-sm.btn-mini.submit").on("click",function (){
            let url = $("#{{ $tabId }}").find('form.form-horizontal').attr('action')
            let formData = $("#{{ $tabId }}").find('form.form-horizontal').serializeArray();
            $.ajax({
                url: url,
                type: 'GET',
                data: formData,
                beforeSend: function() {
                    Dcat.loading();
                },
                complete: function() {
                    Dcat.loading(false);
                },
                success: function(response) {
                    $("#{{ $tabId }}").find('.async-table').html(response)
                    init()
                },
                error: function(xhr) {
                    Dcat.handleAjaxError(xhr);
                }
            })
        })
    }

    //重写重置
    function reset(){
        $("#{{ $tabId }}").find(".reset.btn.btn-white.btn-sm").on("click",function (e){
            e.preventDefault()
            let url = $(this).attr('href')
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    Dcat.loading();
                },
                complete: function() {
                    Dcat.loading(false);
                },
                success: function(response) {
                    $("#{{ $tabId }}").find('.async-table').html(response)
                    init()
                },
                error: function(xhr) {
                    Dcat.handleAjaxError(xhr);
                }
            })
        })
    }

    //重写翻页
    function page(){
        $("#{{ $tabId }}").find(".page-link").on("click",function (e){
            e.preventDefault()
            let url = $(this).attr('href')
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    Dcat.loading();
                },
                complete: function() {
                    Dcat.loading(false);
                },
                success: function(response) {
                    $("#{{ $tabId }}").find('.async-table').html(response)
                    init()
                },
                error: function(xhr) {
                    Dcat.handleAjaxError(xhr);
                }
            })
        })
    }

    //初始化
    function init(){
        changeFilter()
        $("#{{ $tabId }}").find('select').select2();
        refresh()
        // 禁用默认提交
        $("#{{ $tabId }}").find('form.form-horizontal').on('submit', function () {
            return false;
        })
        search()
        reset()
        page()
    }
</script>
