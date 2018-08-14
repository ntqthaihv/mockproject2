<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassContent extends Model
{
    protected $table = 'classcontent';
    protected $fillable = [
        'id','class_id', 'title', 'thumbnail', 'content_short', 'content', 'level', 'duration', 'documents', 'start_date', 'end_date', 'author', 'is_done', 'is_approve',
    ];
    protected $hidden = [];

    // 1 content class thuộc về 1 và chỉ 1 tác giả mà thui
//    public function Users(){
//        return $this->belongsTo('App\Models\User','author','id'); //App\Models\Users
//    }

    // 1 content class thuộc về 1 và chỉ 1 tác giả mà thui
    public function author(){
        return $this->belongsTo('App\Models\User','author','id'); //App\Models\Users
    }

    // 1 nội dung chỉ thuộc về 1 và chỉ 1 Lớp Class
    public function class_id(){
        return $this->belongsTo('App\Models\NtqClass','class_id','id');
    }

    public function listClassContent()
    {
        $list = ClassContent::All();
        return $list;
    }
    public function createContent(array $data){
        ClassContent::create($data);
    }
}
