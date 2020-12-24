<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ScopeUser implements Scope
{
  public function apply(Builder $builder, Model $model)
  {
    // ageが20以上のデータを表示する
    $builder->where('age', '>', 20);
  }
}