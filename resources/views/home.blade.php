@extends('layouts.header')
@section('content')
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
                                <h3 class="article-title entry-title" itemprop="headline">
                                    <a href="http://lauramarchbanks.com/anytime/needham-family-everett-family-photographer/"
                                       title="Permalink to Needham Family &#8211; Everett Family Photographer"
                                       rel="bookmark" itemprop="url">{{ $record->title }}</a></h3>
                            </div>
                            <div class="article-meta article-meta-top">
                                <span class="article-category-list article-meta-item">上传人: <a href="http://lauramarchbanks.com/category/anytime/" rel="category tag">{{ $record->owner }}</a></span></div>
                        </div>
                        <div class="article-content sc pp-img-protect-clicks" data-role="content" itemprop="mainContentOfPage">
                            <a href="http://lauramarchbanks.com/anytime/needham-family-everett-family-photographer/"
                               class="img-to-permalink" title="View full post »">
                                {{ Html::image($record->location, "", ["class" => "pp-excerpt-img pp-excerpt-img-fullsize pp-no-pin img-downsized img-imagick-downsized ov-done", "width" => "650", "height"=>"433"]) }}
                            </a>
                            <p>{{ $record->content }}</p>
                        </div>
                    </div>
                    <div class="article-footer"></div>
                </div>
            </article>
        @endforeach

        <p id="adjacent-posts-links" class="sc content-bg">
                                <span class="prev-post-link-wrap"><a
                                            href="http://lauramarchbanks.com/category/anytime/page/2/">« Older posts</a></span>
            <span class="next-post-link-wrap"></span>
        </p>
    </td>
    </article>
@endsection

@endsection