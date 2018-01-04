@inject('protagonist_model','App\Protagonist')
<td id="sidebar" class="sidebar">
    <ul>
        @foreach ($protagonist_model->show() as $show)
        <li id="pp-custom-icon-6" class="widget sc widget_pp-custom-icon">
            <div class="">
                {!! Html::image($show->location, '', ['width' => '180', 'height'=> '239', 'class'=>"pp-custom-icon"]) !!}
            </div>
        </li>
        <li id="pp-text-4" class="widget widget_pp-text">
            <div class="pp-text-widget-wrap left"><h3 class='widgettitle'>{{ $show->name }}</h3>
                <p>{!! $show->intro !!}</p>
            </div>
        </li>
        @endforeach
    </ul>
</td>