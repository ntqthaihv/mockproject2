<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NtqClass extends Model
{
    protected $table = 'ntqclass';
    protected $fillable = [
        'id','name', 'slug', 'description', 'thumbnail', 'course_id', 'creator', 'start_date', 'end_date',
    ];
    protected $hidden = [];
    // 1 lớp chỉ do 1 user tạo ra
    public function Users(){
        return $this->belongsTo('App\Models\Users','id','creator');
    }
    // 1 lop có o hoặc nhiều sự kiện
    public function ClassEvent(){
        return $this->hasMany('App\Models\ClassEvent','class_id','id');
    }

    // 1 lớp có nhiều member
    public function Member(){
        return $this->hasMany('App\Models\ClassMember','class_id','id');
    }
    // 1 lớp có nhiều nội dung class content
    public function ClassContent(){
        return $this->hasMany('App\Models\ClassContent','class_id ','id');
    }
    public function ClassAttendance(){
        return $this->hasMany('App\Models\ClassAttendance','class_id ','id');
    }
    public function listClass(){
    	return NtqClass::all();
    }
}
