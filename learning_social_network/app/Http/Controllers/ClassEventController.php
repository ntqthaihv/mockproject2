<?php

namespace App\Http\Controllers;

use App\Models\ClassEvent;
use Illuminate\Http\Request;
use App\Models\NtqClass;
use App\Http\Requests\EventRequest;
use App\Models\User;
use App\Models\ClassMember;

class ClassEventController extends Controller
{
    protected $event;

    public function __construct(ClassEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return list event
     */
    public function index()
    {
        $id_user = ClassMember::select('user_id')->where('is_captain', 1)->get();
        $email_captain = User::select('email')->where('id', '=', $id_user[0]['user_id'])->get();
        $list = $this->event->listClassEvent();
        return response()->json(compact('list', 'email_captain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   $request data
     * @return create array data
     */
    public function store(EventRequest $request)
    {
        $email = ['email' => $request->input('email')];
        $user_id = User::select('id')->where('email', $email['email'])->get();
        $captain = ClassMember::select('is_captain')->where('user_id', $user_id[0]['id'])->get();
        if ($captain[0]['is_captain'] == 0) {
            return response()->json(['status' => 'không có quyền']);
        }
        $data = [
            'class_id'      => 1,
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'documents'      => $request->input('documents'),
            'start'         => $request->input('start'),
            'end'           => $request->input('end'),
            'duration'      => $request->input('duration'),
            'author'        => $user_id[0]['id'],
            'auth2'         => $user_id[0]['id'],
            'speaker'       => $request->input('speaker'),
        ];
        $this->event->addEvent($data);
        return response()->json(['status' => 'thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassEvent $classEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassEvent $classEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array data, $id
     * @return update array data
     */
    public function update(EventRequest $request, $id)
    {
        $email = ['email' => $request->input('email')];
        $user_id = User::select('id')->where('email', $email['email'])->get();
        $captain = ClassMember::select('is_captain')->where('user_id', $user_id[0]['id'])->get();
        if ($captain[0]['is_captain'] == 0) {
            return response()->json(['status' => 'không có quyền']);
        }
        $data = [
            'class_id'      => 1,
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'documents'      => $request->input('documents'),
            'start'         => $request->input('start'),
            'end'           => $request->input('end'),
            'duration'      => $request->input('duration'),
            'author'        => $user_id[0]['id'],
            'auth2'         => $user_id[0]['id'],
            'speaker'       => $request->input('speaker'),
        ];
        $this->event->findOrFail($id)->update($data);
        return response()->json("update thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id event
     * @return delete event
     */
    public function destroy(Request $request, $id)
    {
        $captain =[
            'is_captain' => $request->input('is_captain'),
        ];
        if ($captain['is_captain'] == 1) {
            $this->event->find($id)->delete();
            return response()->json(['status' => 'xóa thành công']);
        }
        return response()->json(['status' => 'bạn không có quyền xóa']);
    }
}
