<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Poll;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return view('index', compact('polls'));
    }

    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $storeData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);
        
        $poll = Poll::create($storeData);
        
        return redirect('/home')->with('success', 'Poll has been created!');
    }

    public function show($id)
    {
        // Retrieve and show a specific poll
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
        
        Poll::where('id', $id)->update($updateData);
        
        return redirect('/home')->with('success', 'Poll has been edited');
    }

    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();
        
        return redirect('/home')->with('success', 'Poll has been deleted');
    }
}
