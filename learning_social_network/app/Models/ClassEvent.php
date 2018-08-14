<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassEvent extends Model
{
    protected $table = 'classevent';
    protected $fillable = [
        'class_id', 'title', 'description', 'documents', 'start', 'end', 'duration', 'author', 'auth2', 'speaker',
    ];
    protected $hidden = [];

    // 1 sự kiện chỉ thuộc về 1 và chỉ 1 lop mà thui.
    public function class_id(){
        return $this->belongsTo('App\Models\NtqClass','class_id','id');
    }

    // một sự kiện có một tác giả
    public function author(){
        return $this->belongsTo('App\Models\User','author','id'); //App\Models\Users
    }

    // một sự kiện có một tác giả
    public function auth2(){
        return $this->belongsTo('App\Models\User','auth2','id'); //App\Models\Users
    }

    /**
     *
     * @param
     *
     * @return list event < start
     *
     */
    public function listClassEvent()
    {
        $time = now()->addDay(1);
        $list = ClassEvent::with('class_id', 'author', 'auth2')
            ->where('start', '<=', $time)
            ->get();
        return $list;
    }

    /**
     *
     * @param array data
     *
     * @return create array data
    */
    public function addEvent(array $data)
    {
        return ClassEvent::create($data);
    }
}
