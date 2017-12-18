<?php

namespace App\Http\Requests\API;

use App\Models\HORARIO_M_UC;
use InfyOm\Generator\Request\APIRequest;

class CreateHORARIO_M_UCAPIRequest extends APIRequest
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
        return HORARIO_M_UC::$rules;
    }
}
