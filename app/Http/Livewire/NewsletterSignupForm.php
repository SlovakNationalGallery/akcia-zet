<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Newsletter\NewsletterFacade as Newsletter;


class NewsletterSignupForm extends Component
{
    public $class;
    public $email;
    public bool $success = false;

    protected $rules = [
        'email' => 'required|email',
    ];

    const AKCIA_ZET_INTEREST_ID = 'fb9f031d97';

    public function subscribe()
    {
        $this->success = false;
        $this->validate();

        Newsletter::subscribePending(
            $this->email,
            [], // no merge fields
            '', // use default list defined in MAILCHIMP_LIST_ID env var
            [ 'interests' =>[ self::AKCIA_ZET_INTEREST_ID => true ] ]
        );

        if (!Newsletter::lastActionSucceeded()) {
            $this->addError('subscription', Newsletter::getLastError());
            return;
        };

        $this->success = true;
    }

    public function render()
    {
        return view('livewire.newsletter-signup-form');
    }
}
