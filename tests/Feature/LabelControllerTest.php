<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }


    public function testIndex()
    {
        $response = $this->get('/labels');

        $response->assertStatus(200);
    }


    public function testCreateFail()
    {
        $response = $this->get('/labels/create');

        $response->assertStatus(302);

        $response->assertRedirect('/labels');
    }


    public function testCreateOk()
    {
        $response = $this->actingAs($this->user)
                         ->get('/labels/create');

        $response->assertStatus(200);
    }


    public function testEditOk()
    {
        $label = Label::factory()->create();
        $response = $this->actingAs($this->user)
                         ->get("/labels/$label->id/edit");

        $response->assertStatus(200);
    }


    public function testEditFail()
    {
        $label = Label::factory()->create();
        $response = $this->get("/labels/$label->id/edit");

        $response->assertStatus(302);
    }


    public function testStoreOk()
    {
        $name = 'qwerty';
        $response = $this->actingAs($this->user)
                         ->post('/labels', ['name' => $name]);

        $this->assertDatabaseHas('labels', [
            'name' => $name,
        ]);

        $response->assertStatus(302);
    }


    public function testStoreFail()
    {
        $name = 'qwerty';
        $response = $this->post('/labels', [
            'name' => $name
        ]);

        $this->assertDatabaseMissing('labels', [
            'name' => $name,
        ]);

        $response->assertStatus(302);
    }


    public function testUpdateOk()
    {
        $label = Label::factory()->create();
        $name = 'newName';
        $response = $this->actingAs($this->user)
                        ->put("/labels/$label->id", [
            'name' => $name
        ]);

        $this->assertDatabaseHas('labels', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testUpdateFail()
    {
        $label = Label::factory()->create();
        $name = 'newName';
        $response = $this->put("/labels/$label->id", [
            'name' => $name
        ]);

        $this->assertDatabaseMissing('labels', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyOk()
    {
        $label = Label::factory()->create();

        $response = $this->actingAs($this->user)
                         ->delete("/labels/$label->id");

        $this->assertDatabaseMissing('labels', [
            'id' => $label->id,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyFail()
    {
        $label = Label::factory()->create();

        $response = $this->delete("/labels/$label->id");

        $this->assertDatabaseHas('labels', [
            'id' => $label->id,
        ]);
        $response->assertStatus(302);
    }
}
