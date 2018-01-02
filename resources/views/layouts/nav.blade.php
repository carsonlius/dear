
@inject('SystemNodeModel','App\SystemNode')
<div id="-top-wrap">

    <nav id="primary-nav" class="centered sc">

        <ul class="primary-nav-menu suckerfish sc">
            {{-- 普通节点的展示 --}}
            @foreach($SystemNodeModel->nodeList() as $node)
                <li id="primary_nav_menu_item_12" class="text-categories mi-type-internal mi-categories has-children mi-anchor-text" style="padding-top:17px;padding-bottom:10px;">
                    <a href="#" class="text-categories mi-type-internal mi-categories has-children mi-anchor-text">{{ $node['name'] }}</a>
                    @if(isset($node['child']))
                        <ul style="margin-top:10px;">
                            @foreach($node['child'] as $child)
                                <li class="cat-item cat-item-387 current-cat">
                                    <a href="{{ URL::to($child['node']) }}" target="_blank">{{ $child['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            {{-- 没有登陆 --}}
                @guest
                    <li id="primary_nav_menu_item_12" class="text-categories mi-type-internal mi-categories has-children mi-anchor-text" style="padding-top:17px;padding-bottom:10px;">
                        {!! Html::link('login', '登录', ['class'=> 'text-categories mi-type-internal mi-categories has-children mi-anchor-text', 'style'=>'text-transform:lowercase']) !!}
                    </li>
                    <li id="primary_nav_menu_item_12" class="text-categories mi-type-internal mi-categories has-children mi-anchor-text" style="padding-top:17px;padding-bottom:10px;">
                        {!! Html::link('register', '注册', ['class'=> 'text-categories mi-type-internal mi-categories has-children mi-anchor-text', 'style'=>'text-transform:lowercase']) !!}
                    </li>

                    {{-- 已经登录 --}}
                @else
                    <li id="primary_nav_menu_item_12" class="text-categories mi-type-internal mi-categories has-children mi-anchor-text" style="padding-top:17px;padding-bottom:10px;">
                            <a href="#" class="text-categories mi-type-internal mi-categories has-children mi-anchor-text"
                               style="text-transform:lowercase"> {{ Auth::user()->name }}</a>
                            <ul style="margin-top:10px;">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        退出
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                    </li>
                @endguest
        </ul>
    </nav>

</div>