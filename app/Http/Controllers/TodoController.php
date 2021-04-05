<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$todos = DB::table('todos')->orderBy('updated_at', 'desc')->get();
        $todos = Todo::orderBy('updated_at','desc')->get();
        return view('todo', compact('todos'));
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
        // DB::table('todos')->insert([
        //     'task' => $request->task,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);
        $this->validate($request, [
            'task'=>'required|string|min:5'
        ]);
        Todo::create([
            'task' => $request->task,
        ]);
        return redirect(url('/todolist'));
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
        //$todo = DB::table('todos')->where('id', $id)->first();
        $todo = Todo::where('id', $id)->first();
        return view('edittodo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::table('todos')
        //     ->where('id', '=', $id)
        //     ->update([
        //         'task' => $request->task,
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ]);
        $todo = Todo::findOrFail($id);
        $todo->task = $request->task;
        $todo->save();
        return redirect(url('/todolist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('todos')->delete($id);
        Todo::find($id)->delete();
        return response(true, 200);
    }
}
