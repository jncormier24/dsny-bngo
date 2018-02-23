<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GameTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_have_items()
    {
        $game = factory(\App\Game::class)->create();

        $gameitem = factory(\App\GameItem::class)->create();

        $game->items()->attach($gameitem);

        $this->assertEquals($game->items()->count(), 1);
    }
}
