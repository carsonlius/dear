
@inject('SystemNodeModel','App\SystemNode')
<div id="-top-wrap">

    <nav id="primary-nav" class="centered sc">

        <ul class="primary-nav-menu suckerfish sc">
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
        </ul>
    </nav>

</div>