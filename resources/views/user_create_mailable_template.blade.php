@component('mail::message')

新用户{{ $user->name }}已经在你的网站注册了, 他/她的邮箱是{{ $user->email }}, 劳驾分配角色，优化网站体验

@component('mail::button', ['url' => 'http://penglixia.carsonlius.cn/RoleUser/index'])
分配脚色
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
