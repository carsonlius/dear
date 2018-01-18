@component('mail::message')

新用户<span style="font-weight: bold;">{{ $user->name }}</span> 邮箱: <span style="font-weight: bold">{{ $user->email }}</span>
已经在您的网站注册了, 现在网站总人数是 {{ $user->count }}

@component('mail::button', ['url' => 'http://penglixia.carsonlius.cn/RoleUser/index', 'color' => 'green'])
    用户列表
@endcomponent

Thanks,<br>
From your own website
@endcomponent
