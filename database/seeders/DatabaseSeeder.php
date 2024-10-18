<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Joke;
use App\Models\JokeRating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for ($i = 1; $i <= 15; $i++) {
        //     $joke = Joke::create(['joke' => "joke $i"]);
        // }

        // for ($i = 1; $i <= 20; $i++) {
        //     $joke = Joke::inRandomOrder()->first();
        //     JokeRating::create(['joke_id' => $joke->id, 'user_id' => mt_rand(1, 15), 'rating' => mt_rand(1, 5)]);
        // }

        // $response = Http::withoutVerifying()->get('https://icanhazdadjoke.com/api');

        // Log::info($response);

        $jokeApi = "https://icanhazdadjoke.com";
        $headers = [
            'Accept' => 'application/json'
        ];       

        for ($i = 1; $i <= 15; $i++) {
            sleep(5);
            $response = Http::withHeaders($headers)->withoutVerifying()->get($jokeApi);
            $responseBody = json_decode($response->getBody(), true);
            Log::info($responseBody);
            $checkJoke = Joke::where('joke_original_id',$responseBody['id'])->first();
            if(is_null($checkJoke)){
                $content = str_replace('"','',$responseBody['joke']);
                $content = str_replace("'",'',$content);
                $content = str_replace("/",'',$content);
                $content = str_replace("\\",'',$content);
                $joke = Joke::create(['joke' => $content,'joke_original_id'=>$responseBody['id']]);
            }
        }
    }
}
