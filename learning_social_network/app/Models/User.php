<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'users';

    // 1 user có 0 hoặc nhiều Nội dung content classs
    public function ClassContent(){
        return $this->hasMany('App\Models\ClassContent','author','id');
    }

    // 1 user hasmany 1 or many class tao ra lop
    public function NtqClass(){
        return $this->hasMany('App\Models\NtqClass','creator','id');
    }

    // 1 user tham gia nhieu lop luu trong bang member dang ky tham gia
    public function ClassMember(){
        return $this->hasMany('App\Models\ClassMember','user_id','id');
    }

    // get list user
    public function listUser()
    {
        $list = User::All();
        return $list;
    }

    //public $timestamps = false;
    protected $fillable = [
        'id',
        'email',
        'full_name',
        'family_name',
        'given_name',
        'avatar',
        'password',
        'created_at',
        'updated_at',
    ];

    protected $hidden = ['password'];

    public function createUser($data){
        User::create($data);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
