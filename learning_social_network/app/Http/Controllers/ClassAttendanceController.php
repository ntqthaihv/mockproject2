<?php

namespace App\Http\Controllers;

use App\Models\ClassAttendance;
use App\Models\ClassContent;
use Illuminate\Http\Request;
use App\Models\ClassMember;
use App\Models\User;
use App\Models\NtqClass;

class ClassAttendanceController extends Controller
{
    protected $att;

    public function __construct(ClassAttendance $att)
    {
        $this->att = $att;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json($this->att->listAttendance($id));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $content)
    {
        $datas = $request->input();
        $checkClassContent = ClassContent::where('id', '=', $content)->get()->count();
        $checkClassAtten = ClassAttendance::where('contents', '=', $content)->get()->count();
        if ($checkClassContent == 1) {
            if ($checkClassAtten >= 1) {
                foreach ($datas as $data => $value) {
                    $attent = [
                        'class_id' => 1,
                        'contents' => $content,
                        'member' => $value['member_id'],
                        'status' => $value['status'],
                        'note' => $value['note']
                    ];
                    $result = $this->att
                        ->where('contents', '=', $content)
                        ->where('member', '=', $value['member_id']);
                    $result->update($attent);

                }
                return response()->json(['message' => 'Update OK'], 200);
            } else {
                foreach ($datas as $data => $value) {
                    $attent = [
                        'class_id' => 1,
                        'contents' => $content,
                        'member' => $value['member_id'],
                        'status' => $value['status'],
                        'note' => $value['note']
                    ];
                    $this->att->createAttendance($attent);
                }
                return response()->json(['message' => 'Create OK'], 200);
            }

        }
        return response()->json(['message' => 'not exitst Ntq_class'], 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassAttendance $classAttendance
     * @return \Illuminate\Http\Response
     */
    public
    function show(
        ClassAttendance $classAttendance
    ) {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassAttendance $classAttendance
     * @return \Illuminate\Http\Response
     */
    public
    function edit(
        ClassAttendance $classAttendance
    ) {

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ClassAttendance $classAttendance
     * @return \Illuminate\Http\Response
     */
    public
    function update(
        Request $request,
        ClassAttendance $classAttendance
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassAttendance $classAttendance
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(
        ClassAttendance $classAttendance
    ) {

        //
    }
}
