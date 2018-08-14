<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassAttendance extends Model
{
    protected $table = 'classattendance';
    protected $fillable = [
        'class_id', 'contents', 'member', 'status', 'note', 'created_at', 'updated_at',
    ];
    protected $hidden = [];

    public function content_id()
    {
        return $this->belongsTo('App\Models\ClassContent', 'contents', 'id');
    }

    public function class_id()
    {
        return $this->belongsTo('App\Models\NtqClass', 'class_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\ClassMember', 'member', 'user_id')->with('user_id');
    }

    public function listAttendance($id)
    {
        $class_id = \App\Models\ClassAttendance::where('contents',$id)->value('class_id');
        $members = ClassAttendance::with('member')
        ->select('member','id', 'note')
        ->where('class_id',$class_id)
        ->where('contents',$id)
                    //->where('status', 1)
        ->get();
        return $members;
    }

    public function createAttendance(array $data)
    {
        ClassAttendance::create($data);
    }
    public function updateAttendance(array $data)
    {
        ClassAttendance::updated($data);
    }
}
