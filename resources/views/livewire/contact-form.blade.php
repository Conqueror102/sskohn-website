<div class="cform">
    @if ($reference)
        <div class="cform__done" role="status">
            <i class="ph-light ph-seal-check cform__done-icon" aria-hidden="true"></i>
            <p class="cform__done-title">Received, with thanks.</p>
            <p>Your reference is <strong>{{ $reference }}</strong>. A member of the team will review your message and be in touch. For anything urgent, call {{ config('ssk.phones.0') }}.</p>
            <button type="button" wire:click="startOver" class="link-arrow">Send another message <i class="ph-light ph-arrow-counter-clockwise" aria-hidden="true"></i></button>
        </div>
    @else
        <form wire:submit="submit" novalidate>
            @error('form') <p class="cform__alert" role="alert"><i class="ph-light ph-warning-circle" aria-hidden="true"></i> {{ $message }}</p> @enderror

            <div class="cform__row">
                <div class="field @error('first_name') has-error @enderror">
                    <label for="cf-first">First name</label>
                    <input id="cf-first" type="text" wire:model.blur="first_name" autocomplete="given-name" placeholder="Ada">
                    @error('first_name') <span class="field__error">{{ $message }}</span> @enderror
                </div>
                <div class="field @error('last_name') has-error @enderror">
                    <label for="cf-last">Last name</label>
                    <input id="cf-last" type="text" wire:model.blur="last_name" autocomplete="family-name" placeholder="Okafor">
                    @error('last_name') <span class="field__error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="cform__row">
                <div class="field @error('email') has-error @enderror">
                    <label for="cf-email">Email</label>
                    <input id="cf-email" type="email" wire:model.blur="email" autocomplete="email" placeholder="you@company.com">
                    @error('email') <span class="field__error">{{ $message }}</span> @enderror
                </div>
                <div class="field @error('phone') has-error @enderror">
                    <label for="cf-phone">Phone <span class="field__opt">optional</span></label>
                    <input id="cf-phone" type="tel" wire:model.blur="phone" autocomplete="tel" placeholder="+234 800 000 0000">
                    @error('phone') <span class="field__error">{{ $message }}</span> @enderror
                </div>
            </div>

            <fieldset class="field field--chips @error('practice_area') has-error @enderror">
                <legend>Practice area</legend>
                <div class="chips">
                    @foreach ($areas as $area)
                        <label class="chip">
                            <input type="radio" name="practice_area" value="{{ $area }}" wire:model.live="practice_area">
                            <span>{{ $area }}</span>
                        </label>
                    @endforeach
                </div>
                @error('practice_area') <span class="field__error">{{ $message }}</span> @enderror
            </fieldset>

            <div class="field @error('message') has-error @enderror">
                <label for="cf-message">How can we help?</label>
                <textarea id="cf-message" rows="4" wire:model.blur="message" placeholder="A short description of the matter, parties involved and any deadlines."></textarea>
                @error('message') <span class="field__error">{{ $message }}</span> @enderror
            </div>

            <div class="hp" aria-hidden="true">
                <label for="cf-website">Website</label>
                <input id="cf-website" type="text" wire:model="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="cform__foot">
                <label class="check @error('consent') has-error @enderror">
                    <input type="checkbox" wire:model.live="consent">
                    <span class="check__box" aria-hidden="true"><i class="ph ph-check"></i></span>
                    <span>I agree to the <a href="https://sskohn.com/privacy-policy-2/" target="_blank" rel="noopener">privacy policy</a>.</span>
                </label>

                <button type="submit" class="btn btn--ribbon" wire:loading.attr="disabled" wire:target="submit">
                    <span wire:loading.remove wire:target="submit">Send message</span>
                    <span wire:loading wire:target="submit">Sending&hellip;</span>
                </button>
            </div>
            @error('consent') <span class="field__error">{{ $message }}</span> @enderror
        </form>
    @endif
</div>
