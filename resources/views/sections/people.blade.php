@php
    $partners = config('ssk.partners');
    // Three columns that drift at different speeds on scroll.
    $columns = [[], [], []];
    foreach ($partners as $i => $p) {
        $columns[$i % 3][] = $p;
    }
@endphp

<section class="people section" id="people" aria-labelledby="people-title">
    <div class="wrap">
        <div class="section-split">
            <div>
                <p class="mark"><span>§ 07</span> Our people</p>
                <h2 class="h1" id="people-title" data-split-lines>The <em>partners.</em></h2>
            </div>
            <div class="section-split__text" data-reveal>
                <p>Nine partners &mdash; three of them Senior Advocates of Nigeria, the Nigerian equivalent of King’s Counsel. Supported by of counsel and associates across three offices.</p>
                <a href="https://sskohn.com/partners/" class="link-arrow" target="_blank" rel="noopener">Meet the whole team <i class="ph-light ph-arrow-up-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="people__grid">
            @foreach ($columns as $c => $column)
                <div class="people__col" data-people-col="{{ $c }}">
                    @foreach ($column as $p)
                        <a href="https://sskohn.com/team/{{ $p['slug'] }}/" class="person" target="_blank" rel="noopener">
                            <figure class="person__photo">
                                <img src="https://sskohn.com/wp-content/uploads/2021/10/{{ $p['photo'] }}-640x640.jpg" alt="Portrait of {{ $p['name'] }}" loading="lazy" referrerpolicy="no-referrer">
                                @if ($p['post'])
                                    <span class="person__badge">{{ $p['post'] }}</span>
                                @endif
                            </figure>
                            <div class="person__meta">
                                <h3 class="person__name">{{ $p['name'] }}@if ($p['post'])<span>, {{ $p['post'] }}</span>@endif</h3>
                                <p class="person__role">{{ $p['role'] }}</p>
                                <i class="ph-light ph-arrow-up-right person__arrow" aria-hidden="true"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
