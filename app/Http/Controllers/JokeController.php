<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joke;
use App\Models\JokeRating;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class JokeController extends Controller
{
    public function index()
    {
        $jokes = Joke::withAvg('ratings','rating')->withCount('ratings')->get();
        return view('joke.list',compact('jokes'));
    }

    public function jokePage($id)
    {
        if(empty($id)){
           return redirect()->route('jokes');
        }

        $joke = Joke::find($id);
        return view('joke.detail',compact('joke'));
    }

    public function addRatingToJoke(Request $request,$jokeId)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5'
        ]);

        $ipAddress = $request->ip();

        DB::beginTransaction();
        try{
            $user = User::create([
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make(1234567890),
                'ip_address' => $ipAddress
            ]);
    
            $jokeRate = JokeRating::create([
                'joke_id' => $jokeId,
                'user_id' => $user->id,
                'rating' => $request->rating
            ]);

            DB::commit();
    
            return redirect()->route('jokes')->with(['message'=>'joke rated successfully','type'=>'success']);
        } catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('jokes')->with(['message'=>'something went wrong','type'=>'danger']);
        }
    }
}
