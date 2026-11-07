@php($practices = config('ssk.practices'))

<section class="practice" id="practice" data-practice aria-labelledby="practice-title">
    <div class="practice__pin" data-practice-pin>
        <div class="practice__track" data-practice-track>

            <div class="practice__intro">
                <p class="mark mark--light"><span>§ 03</span> Practice areas</p>
                <h2 class="h1" id="practice-title">Six groups.<br><em>One standard.</em></h2>
                <p class="practice__introtext">From aircraft finance to the committee rooms of the National Assembly &mdash; every group works with the same focused tenacity.</p>
                <div class="practice__hint" aria-hidden="true">
                    <span>Scroll to move through</span>
                    <i class="ph-light ph-arrow-right"></i>
                </div>
            </div>

            @foreach ($practices as $i => $p)
                <article class="pcard {{ $i % 2 ? 'pcard--low' : '' }}" data-pcard>
                    <a href="{{ $p['url'] }}" class="pcard__media" target="_blank" rel="noopener" tabindex="-1" aria-hidden="true">
                        <img src="{{ asset('images/'.$p['image'].'.webp') }}" alt="" loading="lazy" data-pcard-img>
                        <span class="pcard__icon"><i class="ph-light ph-{{ $p['icon'] }}"></i></span>
                    </a>
                    <div class="pcard__body">
                        <div class="pcard__top">
                            <span class="pcard__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}<small>/{{ str_pad(count($practices), 2, '0', STR_PAD_LEFT) }}</small></span>
                        </div>
                        <h3 class="pcard__title"><a href="{{ $p['url'] }}" target="_blank" rel="noopener">{{ $p['title'] }}</a></h3>
                        <p class="pcard__summary">{{ $p['summary'] }}</p>
                        <div class="pcard__matter">
                            <span class="pcard__label">Representative matter</span>
                            <p>{{ $p['matter'] }}</p>
                        </div>
                    </div>
                </article>
            @endforeach

            <div class="practice__end">
                <p class="practice__endtext">Not sure where your matter sits?</p>
                <a href="#contact" class="btn btn--ribbon btn--light">Talk to a partner</a>
            </div>
        </div>
    </div>

    <div class="practice__progress" aria-hidden="true"><span data-practice-progress></span></div>
</section>
