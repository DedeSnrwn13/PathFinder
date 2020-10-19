<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
        'start','to', 'position', 'description', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
