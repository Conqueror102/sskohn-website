@php($items = config('ssk.recognitions'))

<section class="marquee" aria-label="Recognitions">
    <p class="marquee__label">Recognised by</p>
    <div class="marquee__viewport">
        <div class="marquee__track" data-marquee>
            @for ($r = 0; $r < 3; $r++)
                <div class="marquee__group" @if ($r) aria-hidden="true" @endif>
                    @foreach ($items as $item)
                        <span class="marquee__item">{{ $item['name'] }} <small>{{ $item['note'] }}</small></span>
                        <i class="ph-light ph-seal-check marquee__sep" aria-hidden="true"></i>
                    @endforeach
                </div>
            @endfor
        </div>
    </div>
</section>
