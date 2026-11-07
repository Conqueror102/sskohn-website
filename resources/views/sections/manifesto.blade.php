@php
    // Their homepage slider lines, set as one continuous statement with small image "inlays".
    $inlays = [0 => 'courtroom', 1 => 'scales', 3 => 'aviation'];
@endphp

<section class="manifesto section" data-manifesto aria-labelledby="manifesto-label">
    <div class="wrap">
        <div class="section-head">
            <p class="mark" id="manifesto-label"><span>§ 01</span> Our promise</p>
        </div>

        <p class="manifesto__text" data-scrub-words>
            @foreach (config('ssk.promises') as $i => $line)
                <span class="manifesto__line">{{ $line }}</span>
                @isset($inlays[$i])
                    <span class="inlay" aria-hidden="true"><img src="{{ asset('images/'.$inlays[$i].'.webp') }}" alt="" loading="lazy"></span>
                @endisset
            @endforeach
        </p>

        <div class="manifesto__foot">
            <p class="manifesto__sign">&mdash; With focused tenacity.</p>
            <p class="manifesto__note">We are committed to understanding you, your business and your goals &mdash; and to deploying a deep bench of legal experience to solve what you are facing. We go to work for you.</p>
        </div>
    </div>
</section>
