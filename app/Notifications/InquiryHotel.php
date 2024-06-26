<?php

namespace App\Notifications;

use App\Property;
use Illuminate\Mail\Mailable;

/**
 * Class FeedbackForm
 * Notification for property request form
 *
 * @package App\Http\Requests
 */

class InquiryHotel extends Mailable
{
    protected $hotel = null;
    protected $data = null;

    /**
     * Create a new message instance.
     *
     * @param Property|null $hotel
     * @param array $data
     */
    function __construct($hotel, array $data)
    {
        $this->hotel = $hotel;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.inquiry')
            ->subject(__('Rent Inquiry'))
            ->with([
                'hotel' => $this->hotel,
                'data' => $this->data,
            ]);
    }
}
