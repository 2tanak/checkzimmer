<?php

namespace App\Notifications;

use App\Property;
use Illuminate\Mail\Mailable;

/**
 * Class FeedbackForm
 * Notification for feedback form request
 *
 * @package App\Http\Requests
 */

class FeedbackForm extends Mailable
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
        return $this->view('email.feedbackform')
            ->subject(__('Rent Inquiry'))
            ->with($this->data);
    }
}
