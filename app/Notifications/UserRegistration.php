<?php

namespace App\Notifications;

use App\Property;
use Illuminate\Mail\Mailable;

/**
 * Class InquiryRegistration
 * Notification for new user registration form
 *
 * @package App\Http\Requests
 */

class UserRegistration extends Mailable
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

        return $this->view('email.user_registration')
            ->subject(__('Registration on checkzimmer.com'))
            ->with([
                'data' => $this->data,
            ]);
    }
}
