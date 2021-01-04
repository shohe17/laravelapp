<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    public static $rules = array(
      'user_id' => 'required',
      'titel' => 'required',
      'message' => 'required'
    );

    public function getData()
    {
      return $this->id . ': ' . $this->title . ' ('
        . $this->user->name . ')';
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
