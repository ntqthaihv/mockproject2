<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    protected $table = 'classmember';
    protected $fillable = [
        'class_id', 'user_id', 'is_captain', 'status', 'created_at', 'updated_at',
    ];
    protected $hidden = [];

    public function listMember() {
        dd($this->user_id);
    }

    public function listClassMember()
    {
        $list = ClassMember::All();
        return $list;
    }

    public function createMember(array $data)
    {
        return ClassMember::create($data);
    }

    // 1 member chỉ thuộc về 1 user mà thôi
    public function user_id()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // 1 member chỉ thuộc về 1 lớp
    public function class_id()
    {
        return $this->belongsTo('App\Models\NtqClass', 'class_id', 'id');
    }


}
