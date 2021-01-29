<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Models\EmiCalculator;




class Emi extends Controller
{
    //

    public function getCalculation(Request $request, EmiCalculator $emiCalculator){
        $data = [];
        $rules = array(
            'amount'            => 'required|numeric|gt:0',
            'interest'             => 'required|numeric|between:0,100.00|regex:/^\d+(\.\d{1,2})?$/',
            'duration'         => 'required|integer|gt:0',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
    
            // redirect our user back to the form with the errors from the validator
            return Redirect::to('/')
                ->withErrors($validator);
        }
        $emiCalculator->setPrincipal($request->get('amount'))->setInterest($request->get('interest'))->setDuration($request->get('duration'))->setCalculationData()->getEmi($request->get('amount'));
        $data = $emiCalculator->getFinalData();
        return view("welcome", compact("data"));
    }
}
