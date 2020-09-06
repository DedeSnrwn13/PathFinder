<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'user_id', 'institution_id', 'avatar', 'firstname', 'lastname', 'email', 'gender', 'religion', 'address', 'major', 'major_average', 'age', 'expertise', 'experience'
    ];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        } else {
            return asset('images/'.$this->avatar);
        }
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }


    public function nama_lengkap()
    {
        return $this->firstname.' '.$this->lastname;
    }
}
