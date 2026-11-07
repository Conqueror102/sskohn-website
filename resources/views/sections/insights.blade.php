@php
    $event = config('ssk.event');
    $date = \Illuminate\Support\Carbon::parse($event['date'], 'Africa/Lagos');
@endphp

<section class="insights section" id="insights" data-preview-scope aria-labelledby="insights-title">
    <div class="wrap insights__grid">
        <div class="insights__aside">
            <p class="mark"><span>§ 08</span> Insights</p>
            <h2 class="h1" id="insights-title" data-split-lines>Latest <em>thinking.</em></h2>
            <p class="insights__intro" data-reveal>Articles, op-eds and legislative spotlights from our lawyers on the questions shaping Nigerian business.</p>

            <a href="{{ $event['url'] }}" class="event" target="_blank" rel="noopener" data-reveal>
                <span class="event__date">
                    <span class="event__day">{{ $date->format('d') }}</span>
                    <span class="event__month">{{ $date->format('M') }}</span>
                </span>
                <span class="event__body">
                    <span class="event__series"><i class="ph-light ph-broadcast" aria-hidden="true"></i> {{ $event['series'] }}</span>
                    <span class="event__title">{{ $event['title'] }}</span>
                    <span class="event__sub">{{ $event['subtitle'] }}</span>
                    <span class="event__meta">{{ $event['label'] }} <i class="ph-light ph-arrow-up-right" aria-hidden="true"></i></span>
                </span>
            </a>
        </div>

        <ul class="articles">
            @foreach (config('ssk.insights') as $i => $post)
                <li class="article" data-ledger-row data-preview="{{ asset('images/'.$post['image'].'.webp') }}">
                    <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="article__link">
                        <span class="article__meta"><span>{{ $post['kind'] }}</span><span>{{ $post['group'] }}</span></span>
                        <span class="article__title">{{ $post['title'] }}</span>
                        <i class="ph-light ph-arrow-up-right article__arrow" aria-hidden="true"></i>
                    </a>
                </li>
            @endforeach
            <li class="articles__more">
                <a href="https://sskohn.com/blog/articles/" class="link-arrow" target="_blank" rel="noopener">All articles <i class="ph-light ph-arrow-up-right" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>

    <div class="preview" data-preview-el aria-hidden="true"><img src="" alt=""></div>
</section>
