<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                    'id_customer' => 'required|unique:customers,id_customer',
                    'name' => 'required|string',
                    'last_name' => 'required|string',
                    'phone' => 'required',
                    'email' => 'required|email|unique:customers,email',
                ];
                break;
                // case 'GET':
                //rules for GET request
                //     break;
                // case "PUT":
                // rules for PUT request
                //     break;
                // case "DELETE":
                // rules for DELETE request
                //     break;
        }
        return $rules;
    }
}
