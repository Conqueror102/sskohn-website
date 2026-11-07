@php($values = config('ssk.values'))

<section class="values section" id="values" data-values aria-labelledby="values-title">
    <div class="wrap values__grid">
        <div class="values__aside">
            <div class="values__sticky">
                <p class="mark"><span>§ 05</span> Our values</p>
                <h2 class="h2" id="values-title">What we<br><em>hold to.</em></h2>
                <div class="values__counter" aria-hidden="true">
                    <span class="values__counter-window"><span data-values-counter>
                        @foreach ($values as $i => $v)<span>{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>@endforeach
                    </span></span>
                    <span class="values__counter-total">/ {{ str_pad(count($values), 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="values__meter" aria-hidden="true"><span data-values-meter></span></div>
            </div>
        </div>

        <ol class="values__list">
            @foreach ($values as $i => $v)
                <li class="value {{ $i === 0 ? 'is-active' : '' }}" data-value>
                    <h3 class="value__name">{{ $v['name'] }}</h3>
                    <p class="value__text">{{ $v['text'] }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>
