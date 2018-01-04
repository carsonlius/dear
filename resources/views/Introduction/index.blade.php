@extends('layouts.header')
@section('content')
    <td id="content">
        <div class="sq-content">
                <div class="sq-errors" style="display: none;"></div>

                <div class="styled_video_container">
                    <video width="80%" height="240" controls controlsList="nodownload">
                        <source src="{{ url('video/girl.mp4') }}" type="video/mp4">
                    </video>
                </div>
                    {{-- test begin --}}
            {!! Html::style('css/video.css') !!}
            <p>谁，携我之心，融我半世冰霜;</p>
            <p>谁，扶我之肩，驱我一世沉寂。</p>
            <p>谁，唤我之心，掩我一生凌轹。</p>
            <p>执子之手，共你一世风霜;吻子之眸，赠你一世深情。</p>
            <p>我，牵尔玉手，收你此生所有;我，抚尔秀颈，挡你此生风雨</p>

        </div>

    </td>
@endsection