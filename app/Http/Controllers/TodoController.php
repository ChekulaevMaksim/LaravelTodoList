<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $todos = Todo::all();
        return view('index')->with('todos',$todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $todo = new Todo;
        $todo->todo_name = $request->todo_name;
        $todo->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $todo = Todo::where('id',$id)->first();
        //print_r($todo);
        return view('edit')->with('todo',$todo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       // dd($request->all());
        $save = Todo::find($request->todo_id);
        $save->todo_name = $request->todo_name;
        $save->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //dd($id);
        $delete = Todo::find($id);
        $delete->delete();
        return redirect()->back();
    }

    public function complete($id) {

        $changestatus = Todo::find($id);
        $changestatus->is_complete = 1;
        $changestatus->save();

        return redirect()->back();
    }

    public function notcomplete($id) {

        $changestatus = Todo::find($id);
        $changestatus->is_complete = 0;
        $changestatus->save();

        return redirect()->back();
    }
}
