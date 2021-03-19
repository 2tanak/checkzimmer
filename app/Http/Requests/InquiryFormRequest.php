<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $languages = app('locale')->getLanguagesAvailable();
        $languagesLine = implode(",", $languages);
        $numberPerson = [1, 2, 3, 4, 5, 6];
        $numberPersonLine = implode(",", $numberPerson);
        $type = ['Whole apartment', 'House', 'Room', 'Garage'];
        $typeLine = implode(",", $type);

        return [
            'name' => "required|min:2|max:50",
            'company' => "max:50",
            'email' => "required|email",
            'telephone' => "required|min:5|max:15",
            'language' => "required|in:$languagesLine",
            'message' => "max:200",
            "property" => "required|exists:property,id",
            'number-persons' => "required|in:$numberPersonLine",
            'type' => "required|in:$typeLine",
            'arrival-date' => "required|date_format:d/m/Y",
            'date-departure' => "required|date_format:d/m/Y|after:arrival-date",
        ];
    }
}
