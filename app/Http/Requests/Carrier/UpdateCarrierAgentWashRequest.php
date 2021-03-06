<?php

namespace App\Http\Requests\Carrier;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Conf;

class UpdateCarrierAgentWashRequest extends FormRequest
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
//    public function rules()
//    {
//        $id = \Route::current()->parameter('carrierAgentPlatformFeeSetting');
//        $carrier_id = \Auth::user()->carrier_id;
//        return CarrierAgentPlatformFeeSetting::updateRules($carrier_id,$id);
//    }
//    public function attributes()
//    {
//        return Conf\CarrierAgentPlatformFeeSetting::$requestAttributes;
//    }
    public function rules()
    {
        return Conf\CarrierAgentWash::$rules;
    }

    public function attributes()
    {
        return Conf\CarrierAgentWash::$requestAttributes; // TODO: Change the autogenerated stub
    }
}
