<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
        'start','to', 'position', 'description', 'user_id',
    ];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
