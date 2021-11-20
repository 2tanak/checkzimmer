<?php namespace App\Http\Controllers\Api;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\Notifications\FeedbackForm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Json;

/**
 * Class FeedbackController
 * Handles feedbacks from clients
 *
 * @package App\Http\Controllers\Api
 */


class FeedbackController extends Controller {

    /**
     * Returns all stored feedbacks
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Feedback::all());
    }

    /**
     * Stores new feedback in the database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        if (!$this->checkRecaptha($data['grecaptcha'])) {
            return response()->json(['success' => true, 'data' => ['message' => 'GRecaptcha error']]);
        }
        $fb = Feedback::where('client_id', $data['client_id'])->first();
        if (!$fb) {
            $fb = new Feedback;
        }
        $fb->fill($data);
        $fb->save();
        $notificationEmail = env('MAIL_NOTIFICATION_ADDRESS', '');

        Mail::to($notificationEmail)->send(new FeedbackForm($data));
        return response()->json(['success' => true, 'data' => $fb->toArray()]);
    }

    /**
     * Checks recaptcha data to filter spam
     *
     * @param $response
     * @return bool
     */
    public function checkRecaptha($response): bool
    {
        if (isset($response)) {
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = env('GOOGLE_RECAPTHCA3_SECRET');
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $response);
            $recaptcha = json_decode($recaptcha);

            if (!isset($recaptcha->score) || $recaptcha->score < 0.5) {
                return false;
            }
            return true;
        }
        return false;
    }
}
