<?php

namespace App\Http\Controllers;

use App\Models\PeopleFactory;
use Validator;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\People;

class CollectFormController extends BaseController
{

    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            return $this->store($request);
        }

        return view('form',$request->all());
    }

    /*
     * Lavavel 5 has form validation
     *
     * @link https://laravel.com/docs/5.6/validation#creating-form-requests
     */

    public function store(Request $request)
    {
        var_dump($request->all());
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required|max:255',
            'birth' => 'required|max:255',
            'thai_id' => 'required|unique:peoples|digits_between:13,13',
        ];

        $validator = Validator::make($request->all(), $rules);

        /*
         * If has some problem will set error to session.
         *
         */
        if ($validator->fails()) {
            // validator has some problems.
            return redirect()->back()->withErrors($validator);
        }else{
            //do something
            PeopleFactory::create($request->all());
            return redirect()->back()->with('message', 'IT WORKS!');
        }
    }

}

