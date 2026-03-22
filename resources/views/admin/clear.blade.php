<ul class="nav navbar-nav">
    <li class="dropdown dropdown-language nav-item">
        <a class="dropdown-toggle nav-link" href="#" id="dropdown-flag" data-toggle="dropdown">
            <i class="fa fa-trash"></i>
            <span class="selected-language" style="margin-left: 5px">清除缓存</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdown-flag">
            <li class="dropdown-item" data-language="en" onclick="clearCache('cache')">
                <a><i class="fa fa-trash fa-fw"></i><span style="margin-left: 10px">一键清除应用缓存</span></a>
            </li>
            <li style="height:1px;background-color:#eee;"></li>
            <li class="dropdown-item" onclick="clearCache('route')">
                <a><i class="fa fa-file-text fa-fw"></i> <span style="margin-left: 10px">清除路由缓存</span></a>
            </li>
            <li class="dropdown-item" onclick="clearCache('view')">
                <a><i class="fa fa-file-image-o fa-fw"></i> <span style="margin-left: 10px">清除视图缓存</span></a>
            </li>
            <li class="dropdown-item" onclick="clearCache('config')">
                <a><i class="fa fa-file-image-o fa-fw"></i> <span style="margin-left: 10px">清除配置缓存</span></a>
            </li>
           {{-- <li class="dropdown-item" onclick="clearCache('content')">
                <a><i class="fa fa-chrome fa-fw"></i> <span style="margin-left: 10px">清理浏览器缓存</span></a>
            </li>--}}
        </ul>
    </li>
</ul>

<style>
    .dropdown-item a{
        padding: 15px;
    }
</style>

<script>
    function clearCache(type){
        $.ajax({
            url: '/{{config('admin.route.prefix')}}/clear?type='+type,
            method:'get',
            success: function(data){
                if(data.code == 1){
                    toastr.success(data.msg)
                }else{
                    toastr.error(data.msg);
                }
            },
        })
    }

    $(document).ready(function(){
        var warningMessage = "{{ session('warning') }}";
        if(warningMessage) {
            $('#alertBox').append(`<div class="alert alert-warning">${warningMessage}</div>`);
        }
    });
</script>
