<?php

namespace App;

use App\Institution;
use App\Roles;
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
    // protected $table = 'users';

    protected $fillable = [
        'nama_depan','nama_belakang', 'email', 'password', 'activation_code', 'active', 'created_by', 'created_date', 'updated_by', 'updated_date',
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

    public function roles() {
        return $this->hasOne('App\Roles');
    }

    public function about() {
        return $this->hasOne('App\About');
    }

    public function project() {
        return $this->hasOne('App\Project');
    }

    public function skill() {
        return $this->hasOne('App\Skill');
    }

    public function pelamar() {
        return $this->hasOne('App\Pelamar');
    }

    // public function role() {
    //     return $this->belongsTo(UserRole::class);
    // }

    // public function roles() {
    //     return $this->belongsToMany(UserRole::class);
    // }

    // public function hasRole($role) {
    //     return null !== $this->roles()->where('name', $role)->first();
    // }

    // public function hasManyRole($roles) {
    //     return null !== $this->roles()->whereIn('name', $roles)->first();
    // }

    // public function authorizeRoles($roles) {
    //     if(is_array($roles)) {
    //         return $this->hasManyRole($roles) || redirect()->route('/');
    //     }
    //     return $this->hasRole($roles) || redirect()->route('/');
    // }

    public function institution() {
        return $this->hasMany('App\Institution');
    }

    public function employer() {
        return $this->hasMany('App\Employer');
    }

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
