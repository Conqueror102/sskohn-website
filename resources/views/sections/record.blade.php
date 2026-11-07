<section class="record section" id="record" data-preview-scope aria-labelledby="record-title">
    <div class="wrap">
        <div class="section-split">
            <div>
                <p class="mark"><span>§ 04</span> Track record</p>
                <h2 class="h1" id="record-title" data-split-lines>On the <em>record.</em></h2>
            </div>
            <p class="section-split__text" data-reveal>A selection of representative matters across our practice groups, as published by the Firm.</p>
        </div>

        <ol class="ledger">
            @foreach (config('ssk.matters') as $i => $m)
                <li data-ledger-row data-preview="{{ asset('images/'.$m['image'].'.webp') }}">
                    <a href="{{ $m['url'] }}" class="ledger__row" target="_blank" rel="noopener">
                        <span class="ledger__idx">04.{{ $i + 1 }}</span>
                        <span class="ledger__fig">{{ $m['figure'] }}</span>
                        <span class="ledger__title">{{ $m['title'] }}</span>
                        <span class="ledger__group">{{ $m['group'] }}</span>
                        <i class="ph-light ph-arrow-up-right ledger__arrow" aria-hidden="true"></i>
                    </a>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="preview" data-preview-el aria-hidden="true"><img src="" alt=""></div>
</section>
