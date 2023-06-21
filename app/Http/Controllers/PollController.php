<?php

namespace App\Http\Controllers;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('index', compact('poll'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $storeData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);
        $poll = Poll::create($storeData);
        return redirect('/home')->with('completed', 'Poll has been created!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $poll = Poll::findOrFail($id);
        return view('edit', compact('poll'));
    }

    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);
        Poll::whereId($id)->update($updateData);
        return redirect('/home')->with('completed', 'Poll has been edited');
    }

    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();
        return redirect('/home')->with('completed', 'Poll has been deleted');
    }

}

