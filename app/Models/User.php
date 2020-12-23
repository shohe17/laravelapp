<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ユーザーデータを取得
    public function getData()
    {
      // thisで指定されている値を返す、今回でいうとdi, name, age
      return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
      return $query->where('name', $str);
    }

    // ageがnと等しいか、大きい場合
    public function scopeAgeGreaterThan($query, $n)
    { 
      return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
      return $query->where('age', '<=', $n);
    }

    protected static function boot()
    {
      parent::boot();

      // 引数で渡されたbuilderでwhereを呼び出し、ageが20以上に絞り込む
      // 引数のbuilderを使って処理を実行すれば全ての検索処理に適応される
      static::addGlobalScope('age', function(Builder $builder){
        $builder->where('age', '<', 20);
      });
    }
    
}
