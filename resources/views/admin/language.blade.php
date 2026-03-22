<ul class="nav navbar-nav" style="padding: 0 10px;">
    <li class="dropdown dropdown-language nav-item">
        <a class="dropdown-toggle nav-link" href="#" id="dropdown-flag" data-toggle="dropdown">
           {{-- <i class="flag-icon {{$language['icon']}}"></i>
            <span class="selected-language">{{admin_trans_field($language['name'])}}</span>--}}
            <i class="fa fa-language"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdown-flag">
            @foreach($language_list as $key=>$value)
                <li class="dropdown-item" data-language="en" onclick="changeLang('{{$key}}')">
                    <a>{{admin_trans_field($value['name'])}}</a>
                    {{--<a><i class="flag-icon {{$value['icon']}}"></i> {{admin_trans_field($value['name'])}}</a>--}}
                </li>
        @endforeach
        </ul>
    </li>
</ul>

<style>
    .dropdown-item a{
        padding: 15px;
    }
</style>

<script>
    function changeLang(lang){
        $.ajax({
            url: '/{{config('admin.route.prefix')}}/language?language='+lang,
            method:'get',
            success: function(data){
                window.location.reload()
            },
        })
    }
</script>
