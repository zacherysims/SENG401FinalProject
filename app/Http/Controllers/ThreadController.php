<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::all();
        foreach($threads as $thread) {
            $total_number = 10;
            $digits = $total_number - strlen($thread->id);
            $thread->str = str_pad($thread->id, $digits, "0", STR_PAD_LEFT);
        }
        return view('forum.index', compact('threads'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()){
            return redirect('/login');
        }

        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Content' => 'required|string|max:1024'
          ]);
          $validated['title'] = $validated['Title'];
          $validated['content'] = $validated['Content'];
          unset($validated['Title']);
          unset($validated['Content']);
          $validated['user'] = auth()->user()->email;
          Thread::create($validated);
          return redirect('/forum');
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
        $thread = Thread::findOrFail($id);
        $comments = Comment::where('thread_id',$id)->latest()->get();
        return view("forum.show", ['thread' => $thread, 'comments' =>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
