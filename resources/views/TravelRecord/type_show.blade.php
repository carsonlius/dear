@extends('layouts.header')
@section('content')
    <td id="content">
        @foreach($travel_records as $record)
        <article id="article-{{ $record->id }}" class="sc post-7910 post type-post status-publish format-standard hentry category-anytime tag-dave-needham tag-everett-portrait-photographer tag-howarth-park-portraits tag-needham-family tag-seattle-beach-portraits tag-seattle-casual-contemporary-portraits tag-seattle-classic-portraiture tag-seattle-portrait-photographer tag-unique-seattle-photographer excerpt" itemscope itemtype="http://schema.org/WebPage">
            <div class="article-wrap sc content-bg">
                <div class="article-wrap-inner">
                    <div class="article-header sc normal" data-role="header">
                        <span class="article-date article-meta-item">
                            <time class="updated" datetime="2014-12-15" itemprop="datePublished">{{ $record->shot_time->toDateString() }}</time>
                        </span>
                        <div class="article-title-wrap">
                            <h3 class="article-title entry-title" itemprop="headline">{{ $record->title }}</h3>
                        </div>
                        <div class="article-meta article-meta-top">
                            <span class="article-category-list article-meta-item">上传人:{{ $record->owner }}</span></div>
                        </div>
                    <div class="article-content sc pp-img-protect-clicks" data-role="content" itemprop="mainContentOfPage">
                            {{ Html::image($record->location, "", ["class" => "pp-excerpt-img pp-excerpt-img-fullsize pp-no-pin img-downsized img-imagick-downsized ov-done", "width" => "650", "height"=>"433"]) }}
                        <p>{{ $record->content }}</p>
                    </div>
                </div>
                <div class="article-footer"></div>
            </div>
        </article>
        @endforeach
        {{ $travel_records->links() }}
    </td>
</article>
@endsection