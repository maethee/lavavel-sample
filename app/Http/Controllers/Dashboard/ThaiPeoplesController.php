<?php

namespace App\Http\Controllers\Dashboard;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\PeopleLists;

class ThaiPeoplesController extends BaseController
{

    private $filters = array(
        'name'=> 'Name',
        'thai_id'=> 'Thai ID',
        'mobile'=> 'Mobile',
    );

    private $ranges = array(20, 50 , 100, 200);

    public function index(Request $request)
    {
        $params =  array(
            'query'=> $request->all(),
            'filters'=> $this->filters,
            'ranges'=> $this->ranges,
            'results'=> []
        );

        $params['results'] = $this->getFilter($request);
        return view('dashboard', $params);
    }

    public function getFilter(Request $request){
        $request->input('name', current($this->filters));
        return PeopleLists::filterPeople($request->all());
    }

}

