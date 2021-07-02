<?php

namespace App\Notifications;

use App\Property;
use Illuminate\Mail\Mailable;

class InquiryRegistration extends Mailable
{
    protected $data = null;

    /**
     * Create a new message instance.
     *
     * @param Property|null $hotel
     * @param array $data
     */
    function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('email.registration')
            ->subject(__('Registration on check-zimmer.de'))
            ->with([
                'data' => $this->data,
            ]);
    }
}
