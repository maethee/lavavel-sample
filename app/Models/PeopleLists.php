<?php
/*
 * People List
 *
 * @desc if you want data from database or some filter you can make method at here
 *
 */
namespace App\Models;


use App\Models\People;
use Illuminate\Support\Facades\DB;

class PeopleLists
{


    public static function filterPeople( $params ) {

        $page = 1;
        $limit = 20;

        if (!empty($params['page']) && is_numeric($params['page'])) {
            $page = $params['page'];
        }

        if (!empty($params['limit']) && is_numeric($params['limit'])) {
            $limit = $params['limit'];
        }

        $list = People::orderBy('id', 'asc');

        if (!empty($params['search_field']) && !empty($params['search_text'])) {

            if($params['search_field'] === 'name'){
                $list->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%'. $params['search_text'].'%');
            }else{
                var_dump($params['search_text']);
                $list->where($params['search_field'], 'LIKE', '%'. $params['search_text'].'%');
            }

        }

        $list = $list->skip($page)->paginate($limit);
        return $list;
    }
}



