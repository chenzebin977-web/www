<?php return array (
  'dcat/laravel-admin' => 
  array (
    'providers' => 
    array (
      0 => 'Dcat\\Admin\\AdminServiceProvider',
    ),
  ),
  'dingo/api' => 
  array (
    'providers' => 
    array (
      0 => 'Dingo\\Api\\Provider\\LaravelServiceProvider',
    ),
    'aliases' => 
    array (
      'API' => 'Dingo\\Api\\Facade\\API',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'maatwebsite/excel' => 
  array (
    'aliases' => 
    array (
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ),
    'providers' => 
    array (
      0 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
  ),
  'mews/captcha' => 
  array (
    'aliases' => 
    array (
      'Captcha' => 'Mews\\Captcha\\Facades\\Captcha',
    ),
    'providers' => 
    array (
      0 => 'Mews\\Captcha\\CaptchaServiceProvider',
    ),
  ),
  'mosibooms/dcat-iframe-tab' => 
  array (
    'aliases' => 
    array (
      'IframeTab' => 'Mosibooms\\DcatIframeTab\\IframeTab',
    ),
    'providers' => 
    array (
      0 => 'Mosibooms\\DcatIframeTab\\IframeTabProvider',
    ),
    'dont-discover' => 
    array (
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'overtrue/laravel-wechat' => 
  array (
    'aliases' => 
    array (
      'EasyWeChat' => 'Overtrue\\LaravelWeChat\\Facade',
    ),
    'providers' => 
    array (
      0 => 'Overtrue\\LaravelWeChat\\ServiceProvider',
    ),
  ),
  'spatie/eloquent-sortable' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\EloquentSortable\\EloquentSortableServiceProvider',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);