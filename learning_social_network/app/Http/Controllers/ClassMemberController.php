<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ClassMemberResource;
use App\Models\ClassMember;
use App\Http\Requests\AddMemberRequest;

class ClassMemberController extends Controller
{
    protected $member;

    public function __construct(ClassMember $member)
    {
        $this->member = $member;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\ClassMember::with('user_id', 'class_id')
                ->orderBy('is_captain', 'DESC')
                ->get();
////        $data = (object) $data->toArray();
//        $obj = array_merge((array) $data);
//        return response()->json($obj);
////        $data=array_merge($data);
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return status true?flase
     */
    public function store(AddMemberRequest $request)
    {
        $user_id = $request->input('user_id');
        $class_id = $request->input('class_id');
        $checkuser = ClassMember::where('user_id', '=', $user_id)->get()->first();
        $checkclass = ClassMember::where('class_id', '=', $class_id)->get()->first();
        if ($checkuser && $checkclass) {
            return response()->json(['status' => 'đã có trong lớp học']);
        }

        $data = [
            'class_id' => $request->input('class_id'),
            'user_id' => $request->input('user_id'),
            'is_captain' => 0,
            'status' => 0,
        ];
        $this->member->createMember($data);
        return response()->json(['status' => 'thêm thành công member']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassContent $id)
    {
        return new ClassContentResource(ClassContent::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       $data=[
         'class_id'=>$request->input('class_id'),
           'user_id'=>$request->input('class_id'),
           'is_captain'=>$request->input('class_id'),
           'class_id'=>$request->input('class_id'),
       ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_captain = [
            'id' => $request->input('id_captain'),
        ];
        $check = ClassMember::select('is_captain')->where('id', '=', $id_captain['id'])->get();
        if ($check[0]['is_captain'] == 1) {
            $data = [
                'is_captain' => 1,
            ];
            $data1 = [
                'is_captain' => 0,
            ];
            $this->member->findOrFail($id)->update($data);
            $this->member->findOrFail($id_captain['id'])->update($data1);
            return response()->json( "bye nhé cưng");
        }
        return response()->json("cưng éo có quyền nhé");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id )
    {
        $captain =[
            'is_captain' => $request->input('is_captain'),
        ];
        if ($captain['is_captain'] == 1) {
            $this->member->find($id)->delete();
            return response()->json(['status' => 'xóa thành công']);
        }
        return response()->json(['status' => 'bạn không có quyền xóa']);
    }
}
