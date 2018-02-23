<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test*/
    public function it_can_log_in()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $this->get('/home')->assertSee('My Games');
    }

    /** @test */
    public function it_can_have_games()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $game = factory(\App\Game::class)->create(['user_id' => $user->id]);

        $this->assertEquals($user->games()->count(), 1);
    }

    /** @test */
    public function it_can_see_its_games()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $game = factory(\App\Game::class)->create(['user_id' => $user->id]);

        $this->get('/home')->assertSee('Game From ' . $game->created_at->diffForHumans());
    }

    /** @test */
    public function it_can_start_a_game()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $game = factory(\App\Game::class)->create(['user_id' => $user->id]);

        $this->get('play')->assertSee('Game For ' . $game->created_at->toFormattedDateString());
    }
}
