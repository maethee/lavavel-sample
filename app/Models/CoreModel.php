<?php
/*
 * CoreModel
 *
 * @desc This class define core behavior of all model on system.
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class CoreModel extends Model
{

    /*
     * getType
     * @desc it's kind of name collection not include prefix. ex: "sample_user" is name collection. responding from method is "user".
     */
    public function getType() {
        return $this->getTable();
    }

}