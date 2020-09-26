<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Menu;
use App\Human;

class HumanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $menu = factory(Menu::class)->create();
        $human= factory(Human::class)->create(); 

        $response = $this->json('POST','/api/human',[
            'name' => $human->name,
            'nickname' => $human->nickname,
            'email' => $human->email,
            'phone' => $human->phone,
            'age' => $human->age,
            'menu_id' => $menu->id
        ]);

        $response->assertJsonStructure([
                    'id', 'name', 'nickname', 'email', 'phone', 'age', 'menu_id'
                ])->assertStatus(201);

        $this->assertDatabaseHas('humans', [
            'name' => $human->name,
            'nickname' => $human->nickname,
            'email' => $human->email,
            'phone' => $human->phone,
            'age' => $human->age,
            'menu_id' => $menu->id
        ]);
        
    }
}
