<?php

namespace App\Models;

use App\Models\CoreModel;
use DateTime;

class People extends CoreModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'peoples';

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return  "{$this->first_name} {$this->last_name}";
    }

    public function getThaiID() {
        return  $this->thai_id;
    }

    public function getGender() {
        return  $this->gender === 0 ? 'male' : 'female';
    }

    public function getMobile() {
        return  $this->mobile;
    }
}


/*
 * People Factory class
 *
 * @desc create,update,delete
 */

class PeopleFactory {

    public static function create($data)
    {

        $people = new People();
        $people->first_name = $data['first_name'];
        $people->last_name = $data['last_name'];
        $people->gender = $data['gender'];
        $people->birth = new DateTime($data['birth']);
        $people->thai_id = $data['thai_id'];
        $people->address = $data['address'];
        $people->mobile = $data['mobile'];

        return $people->save();
    }
}




