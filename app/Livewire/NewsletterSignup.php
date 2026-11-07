<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewsletterSignup extends Component
{
    #[Validate('required|email:rfc|max:190')]
    public string $email = '';

    public bool $done = false;

    public function subscribe(): void
    {
        $key = 'newsletter:'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('email', 'Please try again in a few minutes.');

            return;
        }

        $this->validate();
        RateLimiter::hit($key, 600);

        Subscriber::firstOrCreate(['email' => strtolower(trim($this->email))]);

        $this->reset('email');
        $this->done = true;
    }

    public function render(): View
    {
        return view('livewire.newsletter-signup');
    }
}
