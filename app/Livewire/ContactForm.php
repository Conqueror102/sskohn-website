<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class ContactForm extends Component
{
    public string $first_name = '';

    public string $last_name = '';

    public string $email = '';

    public string $phone = '';

    public string $practice_area = '';

    public string $message = '';

    public bool $consent = false;

    /** Honeypot: humans never see or fill this field. */
    public string $website = '';

    /** Reference number shown after a successful submission. */
    public ?string $reference = null;

    public function practiceAreas(): array
    {
        return array_merge(array_column(config('ssk.practices'), 'title'), ['Not sure yet']);
    }

    protected function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email:rfc', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40', 'regex:/^[0-9+()\s.-]{6,}$/'],
            'practice_area' => ['required', Rule::in($this->practiceAreas())],
            'message' => ['required', 'string', 'min:20', 'max:4000'],
            'consent' => ['accepted'],
        ];
    }

    protected function messages(): array
    {
        return [
            'practice_area.required' => 'Choose the practice area closest to your matter.',
            'message.min' => 'A sentence or two about the matter helps us route it to the right partner.',
            'consent.accepted' => 'Please confirm you agree to the privacy policy.',
            'phone.regex' => 'Use digits, spaces and + ( ) - only.',
        ];
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function submit(): void
    {
        $key = 'contact:'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('form', 'Too many messages in a short time. Please call us on '.config('ssk.phones.0').'.');

            return;
        }

        $data = $this->validate();
        RateLimiter::hit($key, 600);

        $reference = 'SSK-'.Str::upper(Str::random(6));

        // Bots fill the honeypot; show them the same success state but store nothing.
        if ($this->website === '') {
            Inquiry::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?: null,
                'practice_area' => $data['practice_area'],
                'message' => $data['message'],
                'reference' => $reference,
            ]);
        }

        $this->reset(['first_name', 'last_name', 'email', 'phone', 'practice_area', 'message', 'consent', 'website']);
        $this->reference = $reference;
    }

    public function startOver(): void
    {
        $this->reference = null;
    }

    public function render(): View
    {
        return view('livewire.contact-form', [
            'areas' => $this->practiceAreas(),
        ]);
    }
}
