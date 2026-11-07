<section class="firm section" id="firm" aria-labelledby="firm-title">
    <div class="wrap">
        <div class="firm__grid">
            <div class="firm__copy">
                <p class="mark"><span>§ 02</span> The Firm</p>
                <h2 class="h1" id="firm-title" data-split-lines>Advice on a full range of <em>legal matters.</em></h2>

                <div class="firm__body" data-reveal>
                    <p class="lead">Streamsowers &amp; Köhn is a team of highly motivated legal professionals dedicated to offering our clients confidence &mdash; confidence that we will do all that can legitimately be done to ensure a successful outcome.</p>
                    <p>We extol excellence and act accordingly. A culture of focused tenacity shows in a rigorous approach to legal issues and in responsiveness to our clients’ needs. You have placed your trust in us; our goal is always to secure or enhance your position, and to exceed your expectations.</p>
                </div>

                <a href="https://sskohn.com/the-firm/who-we-are/" class="link-arrow" target="_blank" rel="noopener" data-reveal>
                    Get the Firm’s brochure <i class="ph-light ph-file-arrow-down" aria-hidden="true"></i>
                </a>
            </div>

            <div class="firm__media">
                <figure class="frame frame--wide" data-clip-reveal>
                    <img src="{{ asset('images/library.webp') }}" alt="A wood-panelled law library with leather-bound law reports" loading="lazy" data-parallax="-8">
                </figure>
                <figure class="frame frame--arch firm__inset" data-clip-reveal="up">
                    <img src="{{ asset('images/scales.webp') }}" alt="Close-up of brass balance scales" loading="lazy" data-parallax="10">
                </figure>
                <figcaption class="caption firm__caption">Fig. 01 &mdash; Balanced counsel amidst competing interests.</figcaption>
            </div>
        </div>

        {{-- Heritage triad: their "blend the seemingly incongruous" line, given room to breathe. --}}
        <div class="heritage" data-heritage>
            <div class="heritage__cols">
                @foreach ([['I', 'Nigerian roots', 'A practice built in, and for, the Nigerian market.'], ['II', 'African heritage', 'Building towards the pre-eminent full-service firm in West Africa.'], ['III', 'Common-law tradition', 'Practising law with the discipline of the common law.']] as [$num, $title, $text])
                    <div class="heritage__col" data-heritage-col>
                        <span class="heritage__num">{{ $num }}</span>
                        <h3 class="heritage__title">{{ $title }}</h3>
                        <p>{{ $text }}</p>
                    </div>
                @endforeach
            </div>
            <p class="heritage__statement" data-split-lines>We are comfortable with every aspect of our heritage &mdash; and able to <em>blend the seemingly incongruous.</em></p>
        </div>

        <dl class="figures">
            @foreach (config('ssk.figures') as $figure)
                <div class="figures__item" data-figure>
                    <dt class="figures__label">{{ $figure['label'] }}</dt>
                    <dd class="figures__value"><span data-count="{{ $figure['value'] }}">{{ $figure['value'] }}</span><small>{{ $figure['suffix'] }}</small></dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
