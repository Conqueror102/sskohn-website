@php($tel = fn ($n) => preg_replace('/[^0-9+]/', '', str_replace('(0)', '', $n)))

<footer class="footer" data-footer>
    <div class="wrap">
        <div class="footer__cta">
            <p class="footer__big" data-split-lines>Confidence, <em>on your side.</em></p>
            <a href="mailto:{{ config('ssk.email') }}" class="footer__mail">
                <span>{{ config('ssk.email') }}</span>
                <i class="ph-light ph-arrow-up-right" aria-hidden="true"></i>
            </a>
        </div>

        <div class="footer__cols">
            <div class="footer__col">
                <h3 class="footer__head">Practice areas</h3>
                <ul>
                    @foreach (config('ssk.practices') as $p)
                        <li><a href="{{ $p['url'] }}" target="_blank" rel="noopener">{{ $p['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__col">
                <h3 class="footer__head">The Firm</h3>
                <ul>
                    @foreach (config('ssk.footer_links') as $label => $href)
                        <li><a href="{{ $href }}" target="_blank" rel="noopener">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__col">
                <h3 class="footer__head">Call</h3>
                <ul>
                    @foreach (config('ssk.phones') as $phone)
                        <li><a href="tel:{{ $tel($phone) }}">{{ $phone }}</a></li>
                    @endforeach
                </ul>
                <h3 class="footer__head footer__head--gap">Follow</h3>
                <ul class="footer__social">
                    @foreach (config('ssk.social') as $label => $href)
                        <li><a href="{{ $href }}" target="_blank" rel="noopener"><i class="ph-light ph-{{ strtolower($label) }}-logo" aria-hidden="true"></i> {{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__col footer__col--wide">
                <h3 class="footer__head">Join our mailing list</h3>
                <p class="footer__note">Insights, events and legislative spotlights. No more than a few a month.</p>
                <livewire:newsletter-signup />
            </div>
        </div>
    </div>

    <div class="footer__wordmark" aria-hidden="true" data-footer-mark>SSKÖHN</div>

    <div class="wrap footer__base">
        <span>&copy; {{ date('Y') }} Streamsowers &amp; Köhn. All rights reserved.</span>
        <span>A website design proposal &mdash; content from sskohn.com</span>
        <a href="#top" class="footer__top">Back to top <i class="ph-light ph-arrow-up" aria-hidden="true"></i></a>
    </div>
</footer>
