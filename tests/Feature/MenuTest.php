<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Menu;
use App\Human;

class MenuTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetMenu()
    {
        $menu = factory(Menu::class)->create();
        $human = factory(Human::class,3)->create([
            'menu_id' => $menu->id
        ]);

        $response = $this->json('GET','/api/menu');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'id', 'name', 'url', 'humans' => [
                        '*' => [
                            'id', 'name', 'nickname', 'email', 'phone', 'age', 'menu_id'
                        ]
                    ]
                ]);

        $this->assertCount(3, $response->json()['humans']);
    }
}
