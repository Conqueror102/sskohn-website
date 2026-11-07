<div class="newsletter">
    @if ($done)
        <p class="newsletter__done" role="status"><i class="ph-light ph-check-circle" aria-hidden="true"></i> You’re on the list.</p>
    @else
        <form wire:submit="subscribe" class="newsletter__form" novalidate>
            <label for="nl-email" class="sr-only">Email address</label>
            <input id="nl-email" type="email" wire:model="email" placeholder="Your email address" autocomplete="email">
            <button type="submit" aria-label="Subscribe" wire:loading.attr="disabled">
                <i class="ph-light ph-arrow-right" aria-hidden="true" wire:loading.remove wire:target="subscribe"></i>
                <i class="ph-light ph-circle-notch newsletter__spin" aria-hidden="true" wire:loading wire:target="subscribe"></i>
            </button>
        </form>
        @error('email') <span class="field__error field__error--light">{{ $message }}</span> @enderror
    @endif
</div>
