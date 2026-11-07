@php
    $links = [
        ['label' => 'The Firm', 'href' => '#firm'],
        ['label' => 'Practice', 'href' => '#practice'],
        ['label' => 'Record', 'href' => '#record'],
        ['label' => 'People', 'href' => '#people'],
        ['label' => 'Insights', 'href' => '#insights'],
    ];
@endphp

<header class="nav" data-nav>
    <div class="nav__bar wrap">
        <a href="#top" class="wordmark" aria-label="Streamsowers & Köhn — home">
            <span class="wordmark__main">SSKÖHN</span>
            <span class="wordmark__sub">Streamsowers<br>&amp; Köhn</span>
        </a>

        <nav class="nav__links" aria-label="Primary">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}" class="nav__link"><span data-text="{{ $link['label'] }}">{{ $link['label'] }}</span></a>
            @endforeach
        </nav>

        <div class="nav__end">
            <span class="nav__clock" title="Local time at our Lagos office">
                <i class="ph-light ph-clock" aria-hidden="true"></i>
                Lagos <time data-clock>--:--</time> WAT
            </span>
            <a href="#contact" class="btn btn--ribbon btn--sm">Get in touch</a>
            <button class="nav__toggle" type="button" aria-expanded="false" aria-controls="menu" data-menu-toggle>
                <span class="sr-only">Open menu</span>
                <span class="nav__toggle-lines" aria-hidden="true"><span></span><span></span></span>
            </button>
        </div>
    </div>
</header>

<div class="menu" id="menu" data-menu aria-hidden="true">
    <div class="menu__inner wrap">
        <nav class="menu__links" aria-label="Mobile">
            @foreach ([...$links, ['label' => 'Contact', 'href' => '#contact']] as $i => $link)
                <a href="{{ $link['href'] }}" class="menu__link" data-menu-link>
                    <span class="menu__num">0{{ $i + 1 }}</span>{{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="menu__foot">
            <a href="mailto:{{ config('ssk.email') }}">{{ config('ssk.email') }}</a>
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', str_replace('(0)', '', config('ssk.phones.0'))) }}">{{ config('ssk.phones.0') }}</a>
            <span>Lagos · Abuja · Port Harcourt</span>
        </div>
    </div>
</div>
