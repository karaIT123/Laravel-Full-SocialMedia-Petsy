<?php

namespace App\Http\Validator;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class validator extends \Illuminate\Validation\Validator
{
    public function validatePetsowner($attribute, $value, $paramters)
    {
        if(empty($value)){
            return false;
        }

        $pets_count = Pet::whereIn('id',$value)->where('user_id',Auth::user()->id)->count();
        #dd($pets_count);
        return count($value)  == $pets_count;
    }

    public function validateDimension($attribute, $value, $paramters)
    {
        $image = Image::make($value);
        return $image->width() >= $paramters[0] && $image->height() >= $paramters[1];
        #dd($paramters);
    }

    protected function replaceDimension($message, $attribute, $rule, $parameters)
    {
        $message = str_replace(':width',$parameters[0],$message);
        $message = str_replace(':height',$parameters[1],$message);
        return $message;
    }
}
