<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
      'user_id' => 'required',
      'titel' => 'required',
      'message' => 'required',
    );

    public function getData()
    {
      return $this->id . ' :' . $this->title;
    }
}
