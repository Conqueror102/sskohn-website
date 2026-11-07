@php($event = config('ssk.event'))

<section class="hero" id="top" data-hero>
    <div class="hero__stage wrap">

        <h1 class="hero__title" aria-label="We give you confidence.">
            <span class="hero__kicker" aria-hidden="true"><span data-hero-line>We give you</span></span>
            <span class="hero__word" aria-hidden="true" data-hero-word>
                @foreach (mb_str_split('CONFIDENCE') as $i => $char)
                    <span class="hero__char" data-hero-char data-i="{{ $i }}">{{ $char }}</span>
                @endforeach
            </span>
        </h1>

        <div class="hero__figure" data-hero-figure>
            <svg class="hero__arch" viewBox="0 0 400 640" preserveAspectRatio="none" aria-hidden="true">
                <path data-hero-arch d="M1 639 V200 A199 199 0 0 1 399 200 V639" fill="none" vector-effect="non-scaling-stroke"/>
            </svg>
            <div class="hero__glow" aria-hidden="true"></div>
            <img src="{{ asset('images/statue.webp') }}" alt="Bronze statue of Lady Justice holding the scales" class="hero__statue" data-hero-statue width="650" height="1294" fetchpriority="high">
            <div class="hero__shadow" aria-hidden="true"></div>
        </div>

        <div class="hero__aside hero__aside--left" data-hero-fade>
            <i class="ph-light ph-arrow-down hero__arrow" aria-hidden="true"></i>
            <p class="hero__lede">Advice on a full range of legal matters &mdash; from the boardroom to every level of the Nigerian courts.</p>
        </div>

        <div class="hero__aside hero__aside--right" data-hero-fade>
            <p>A team of highly motivated legal professionals, dedicated to giving clients confidence that their legal challenges are being addressed.</p>
            <div class="hero__ctas">
                <a href="#contact" class="btn btn--ribbon">Book a consultation</a>
                <a href="#practice" class="link-arrow">Our practice <i class="ph-light ph-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <a href="#contact" class="seal hero__seal" data-hero-fade aria-label="Contact our offices in Lagos, Abuja and Port Harcourt">
            <svg viewBox="0 0 120 120" class="seal__ring" aria-hidden="true">
                <defs><path id="sealPath" d="M60,60 m-46,0 a46,46 0 1,1 92,0 a46,46 0 1,1 -92,0"/></defs>
                <text><textPath href="#sealPath" textLength="285">LAGOS · ABUJA · PORT HARCOURT ·</textPath></text>
            </svg>
            <i class="ph-light ph-arrow-up-right seal__icon" aria-hidden="true"></i>
        </a>

        <div class="hero__rail" aria-hidden="true" data-hero-fade>
            <span>Victoria Island, Lagos</span>
            <span class="hero__rail-line"></span>
            <span>Scroll</span>
        </div>
    </div>

    <div class="hero__watermark" aria-hidden="true" data-hero-watermark>Streamsowers</div>
</section>
