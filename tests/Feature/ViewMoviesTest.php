<?php

namespace Tests\Feature;

// use Facade\Ignition\Solutions\LivewireDiscoverSolution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use App\Http\Livewire;

class ViewMoviesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */

    public function the_main_page_shows_correct_info()
    {
        $response =$this->get(route('movies.index'));
        $response->assertSuccessful();
        // $response->assertSee('Popular Movies');
    }

    /** @test */
    public function the_search_dropdown_works_correctly()
    {
        Http::fake([
            'https://api.themoviedb.org/3/search/movie?query=jumanji' => $this->fakeSearchMovies()
        ]);
        Livewire::test('search-dropdown')->assertDontSee("Jumanji")->set('search', 'Jumanji')->assertSee('Jumanji');
    }

    public function fakeSearchMovies()
    {
        return Http::response([
            'results' => [
                [
                    'popularity' => 100,
                    'video' => false,
                    'poster_path' => 'assdfjlxfaserrwre.jpg',
                    'original_title' => 'Jumanji',
                    'title' => 'Jumanji',
                ]
            ]
        ]);
    }
}
