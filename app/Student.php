<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    const SEX_UN=10;
    const SEX_BOY=20;
    const SEX_GRIL=30;

    protected $table='student';

    protected $fillable=['name','age','sex'];

    public $timestamps= true;

    protected function getDateFormat()
    {
        return time();
    }

   // protected function asDateTime($value)
    //{
      //  return $value;
    //}

    public function sex($ind=null)
    {
        $arr=[
          self::SEX_UN=>'非公開',
          self::SEX_BOY=>'男性',
          self::SEX_GRIL=>'女性',
        ];
        if($ind !== null)
        {
            return array_key_exists($ind,$arr)?$arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }
}
