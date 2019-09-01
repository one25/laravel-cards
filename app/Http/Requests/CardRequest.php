<?php

namespace App\Http\Requests;

class CardRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $regex = '/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/';

        return $rules = [
            'number' => 'bail|required|regex:' . $regex,
        ];
    }
}
