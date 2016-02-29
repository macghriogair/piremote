<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Plug extends Model
{
    protected $fillable = ['name','systemcode','unitcode','status'];

    protected $attributes = array(
      'name' => 'A Post'
    );

    public function getKey()
    {
        return $this->systemcode.$this->unitcode;
    }
}
