<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';

    protected $fillable = [
        'user_id', 'skill_one', 'skill_two', 'skill_three', 'skill_four', 'skill_five', 'skill_six', 'skill_seven', 'skill_eight', 'skill_nine', 'skill_ten', 'skill_level_one', 'skill_level_two', 'skill_level_three', 'skill_level_four', 'skill_level_five', 'skill_level_six', 'skill_level_seven', 'skill_level_eight', 'skill_level_nine', 'skill_level_ten',
    ];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
