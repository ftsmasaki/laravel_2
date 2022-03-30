<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssetRequest extends FormRequest
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
        return [
            'customer_id' => ['required','integer'],
            'asset_name' => ['required','string','max:191'],
            'asset_user_name' => ['required','string','max:191',
                Rule::unique('assets')->ignore($this->input('ignore_validation'))->where(function($query) {
                    $query->where('customer_id',$this->input('customer_id'));
                    $query->where('asset_name',$this->input('asset_name'));
                }),
            ],
        ];
    }
}
