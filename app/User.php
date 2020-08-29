<?php

namespace App;

use App\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,CanResetPasswordContract
{
    use Notifiable, Authenticatable, CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'email', 'password', 'activation_code', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function siswa()
    {
    	return $this->hasOne(Siswa::class);
    }

    // public function institution()
    // {
    // 	return $this->belongsTo(Institution::class);
    // }

    public function activateAccount($code)
    {
        $user = User::where('activation_code', $code)->first();

        if ($user) {
            $user->update(['active' => 1, 'activation_code' => NULL]);
            Auth::login($user);

            return true;
        }
    }
}
