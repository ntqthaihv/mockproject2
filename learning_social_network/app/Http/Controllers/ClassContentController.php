<?php

namespace App\Http\Controllers;

use App\Models\ClassContent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ClassContentResource;
use App\Http\Requests\AddContentRequest;

class ClassContentController extends Controller
{
    protected $content;

    public function __construct(ClassContent $content)
    {
        $this->content = $content;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\ClassContent::with('author', 'class_id')
            ->orderBy('is_done', 'ASC')
            ->orderBy('end_date', 'DESC')
            ->orderBy('start_date', 'DESC')
            ->get();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        try {
            $this->content->createContent($request->all());
            return response()->json(['message' => 'OK'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'FAIL'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddContentRequest $request)
    {
        $content = $request->input('content');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $email = $request->input('email');
        $user_id = User::select('id')->where('email', '=', $email)->get();
        $time = strtotime($end_date) - strtotime($start_date);
        if (($end_date) <= now()) {
            $is_done = 1;
        } else {
            $is_done = 0;
        }
        $data = ["class_id" => $request->input('class_id'),
            "title" => $request->input('title'),
            "thumbnail" => 'https://lh6.googleusercontent.com/-zHUNkJf1l94/AAAAAAAAAAI/AAAAAAAAAAc/6yroSCjBj30/s96-c/photo.jpg',
            "content_short" => $this->limit_words($content, 25),
            "content" => $request->input('content'),
            "level" => $request->input('level'),
            "duration" => $time,
            "documents" => 'NTQ-solution.com',
            "start_date" => $request->input('start_date'),
            "end_date" => $request->input('end_date'),
            "author" => $user_id[0]['id'],
            "is_done" => $is_done,
            "is_approve" => 0,

            ];
        $this->content->createContent($data);
        return response()->json(['message' => 'Create OK'], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ClassContentResource($this->content->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassContent $classContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function update(AddContentRequest $request, $id)
    {

        $content = $request->input('content');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $email = $request->input('email');
        $user_id = User::select('id')->where('email', $email)->get();
        $time = strtotime($end_date) - strtotime($start_date);
        if (($end_date) <= now()) {
            $is_done = 1;
        } else {
            $is_done = 0;
        }
        $data = ["class_id" => $request->input('class_id'),
            "title" => $request->input('title'),
            "thumbnail" => 'https://lh6.googleusercontent.com/-zHUNkJf1l94/AAAAAAAAAAI/AAAAAAAAAAc/6yroSCjBj30/s96-c/photo.jpg',
            "content_short" => $this->limit_words($content, 25),
            "content" => $request->input('content'),
            "level" => $request->input('level'),
            "duration" => $time,
            "documents" => 'NTQ-solution.com',
            "start_date" => $request->input('start_date'),
            "end_date" => $request->input('end_date'),
            "author" => $user_id[0]['id'],
            "is_done" => $is_done,
            "is_approve" => 0,

        ];

        $content = $this->content->findOrFail($id);
        $content->update($data);
        return response()->json(['message' => 'Updated OK'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassContent $classContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = $this->content->findOrFail($id);
        $content->delete();
        return response()->json(['message' => 'Deleted OK'], 200);
    }

    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        $result = implode(" ", array_splice($words, 0, $word_limit));
        return $result . " ...";    }
}
