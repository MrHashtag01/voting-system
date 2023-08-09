<?php

namespace App\Http\Controllers;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $polls = Poll::all();
        
        //Role::create(['name'=>'voter']);
        //Permission::create(['name'=> 'can vote']);

        //Role::create(['name'=>'admin']);
        //Permission::create(['name'=> 'does everything']);

        //auth()->user()->givePermissionTo('can vote');
        //auth()->user()->assignRole('voter');
        
        //$doesEverythingPermission = Permission::where('name', 'can vote')->first();
        //$adminRole = Role::where('name', 'voter')->first();
        //$adminRole->givePermissionTo($doesEverythingPermission);
        
        return view('home', compact('polls'));
    }

    
}
