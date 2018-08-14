<?php

namespace App\Http\Controllers;

use App\Models\NtqClass;
use Illuminate\Http\Request;
use App\Http\Resources\NtqClassResource;

class NtqClassController extends Controller
{
    protected $class;

    public function __construct(NtqClass $class)
    {
        $this->class = $class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $list = $this->class->listClass();
//        return $list;
        //return new NtqClassResource(NtqClass::all());
        //return response()->json($this->class->listClass(),200);
        return response()->json($this->class->listClass(),200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NtqClass  $ntqClass
     * @return \Illuminate\Http\Response
     */
    public function show(NtqClass $ntqClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NtqClass  $ntqClass
     * @return \Illuminate\Http\Response
     */
    public function edit(NtqClass $ntqClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NtqClass  $ntqClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NtqClass $ntqClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NtqClass  $ntqClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(NtqClass $ntqClass)
    {
        //
    }
}
