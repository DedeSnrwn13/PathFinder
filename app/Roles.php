<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    // protected $table = 'roles';

    protected $fillable = [
        'user_id', 'name', 'description',
    ];

    public function users(){
        return $this->BelongsTo('App\User');
    }


}
