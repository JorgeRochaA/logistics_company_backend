<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
        $rules = [];

        switch ($this->method()) {
            case "POST":
                $rules = [
                    'details' => 'required|string',
                    'weight' => 'required|numeric',
                    'delivery_to' => 'required|string',
                    'fk_id_customer' => 'required|numeric',
                ];
                break;
                // case 'GET':
                // rules for GET request
                //     break;
            case "PUT":
                $rules = [
                    'id' => 'required|numeric',
                    'fk_id_status' => 'required|numeric',
                ];
                break;
                // case "DELETE":
                // rules for DELETE request
                //     break;
        }
        return $rules;
    }
}
