<section class="contact section" id="contact" aria-labelledby="contact-title">
    <div class="wrap">
        <div class="contact__grid">
            <div class="contact__visual">
                <figure class="frame frame--arch contact__frame" data-clip-reveal="up">
                    <img src="{{ asset('images/courtroom.webp') }}" alt="An empty wood-panelled courtroom in warm afternoon light" loading="lazy" data-parallax="8">
                </figure>
                <div class="contact__overlay">
                    <p class="mark mark--light"><span>§ 09</span> Contact</p>
                    <p class="contact__line">Let’s join your <em>team today.</em></p>
                </div>
            </div>

            <div class="contact__form">
                <h2 class="h2" id="contact-title">Get in <em>touch.</em></h2>
                <p class="contact__intro">Tell us a little about the matter. Everything you share is treated with the confidentiality of the lawyer&ndash;client relationship.</p>
                <livewire:contact-form />
            </div>
        </div>

        <div class="offices">
            @foreach (config('ssk.offices') as $i => $office)
                <div class="office" data-reveal>
                    <span class="office__num">0{{ $i + 1 }}</span>
                    <h3 class="office__city">{{ $office['city'] }}</h3>
                    <span class="office__tag">{{ $office['tag'] }}</span>
                    <p class="office__address">{{ $office['address'] }}</p>
                    <a class="link-arrow link-arrow--sm" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($office['address'].', Nigeria') }}" target="_blank" rel="noopener">Directions <i class="ph-light ph-map-pin" aria-hidden="true"></i></a>
                </div>
            @endforeach
        </div>
    </div>
</section>
