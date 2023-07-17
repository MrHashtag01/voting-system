<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }

    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $request['slug'] = str()->slug($request->slug);
        
        $storeData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);
        
        $polls = Poll::create($storeData);
        
        return redirect('/home')->with('success', 'Poll has been created!');
    }

    public function show($slug)
    {
        $polls = Poll::where('slug', $slug)->firstOrFail();
        $user = auth()->user();
        $selectedVote = null;
        
        if ($user) {
            $selectedVote = Vote::where('user_id', $user->id)
                ->where('poll_id', $polls->id)
                ->first();
        }       
    
        
        return view('polls.show', compact('polls', 'selectedVote'));
    }

    public function vote(Request $request, $id)
{
    $request->validate([
        'vote' => 'required|in:yes,no',
    ]);

    $poll = Poll::findOrFail($id);
    $user = auth()->user();

    $existingVote = Vote::where('user_id', $user->id)
    ->where('poll_id', $poll->id)
    ->first();

    if ($existingVote) {
        
        $existingVote->vote = $request->vote === 'yes' ? 1 : 0;
        $existingVote->save();
        
    
    
        return redirect('/home')->with('success', 'Your vote has been updated');
    }

    else {
    $vote = new Vote();
    $vote->user_id = auth()->id();
    $vote->poll_id = $poll->id;
    $vote->vote = $request->vote === 'yes' ? 1 : 0;
    $vote->save();
        
}

    $this->updateVotesColumn();
    return redirect('/home')->with('success', 'Your vote has been recorded');    
}

    public function edit($id)
    {
        $polls = Poll::findOrFail($id);
        
        return view('polls.edit', compact('polls'));
    }

    public function update(Request $request, $id)
    {
        $request['slug'] = str()->slug($request->slug);
        
        $updateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);
        
        Poll::where('id', $id)->update($updateData);
        
        return redirect('/home')->with('success', 'Poll has been edited');
    }

    public function destroy($id)
    {
        $polls = Poll::findOrFail($id);
        $polls->delete();
        
        return redirect('/home')->with('success', 'Poll has been deleted');
    }

    private function updateVotesColumn()
    {
        $allpolls = Poll::all();

        foreach ($allpolls as $allpoll) {
        
            $votesCount = DB::table('votes')->where('poll_id', $allpoll->id)->count();

        $allpoll->votes = $votesCount;
        $allpoll->save();
    }

        return redirect('/home')->with('success', 'Votes count has been updated successfully');
    }


}


