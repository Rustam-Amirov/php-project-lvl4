<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\TaskStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
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
        $response = $this->get('/task_statuses');

        $response->assertStatus(200);
    }


    public function testCreateFail()
    {
        $response = $this->get('/task_statuses/create');

        $response->assertStatus(302);

        $response->assertRedirect('/task_statuses');
    }


    public function testCreateOk()
    {
        $response = $this->actingAs($this->user)
                         ->get('/task_statuses/create');

        $response->assertStatus(200);
    }


    public function testEditOk()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($this->user)
                         ->get("/task_statuses/$taskStatus->id/edit");

        $response->assertStatus(200);
    }


    public function testEditFail()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->get("/task_statuses/$taskStatus->id/edit");

        $response->assertStatus(302);
    }


    public function testStoreOk()
    {
        $name = 'qwerty';
        $response = $this->actingAs($this->user)
                         ->post('/task_statuses', ['name' => $name]);

        $this->assertDatabaseHas('task_statuses', [
            'name' => $name,
        ]);

        $response->assertStatus(302);
    }


    public function testStoreFail()
    {
        $name = 'qwerty';
        $response = $this->post('/task_statuses', [
            'name' => $name
        ]);

        $this->assertDatabaseMissing('task_statuses', [
            'name' => $name,
        ]);

        $response->assertStatus(302);
    }


    public function testUpdateOk()
    {
        $taskStatus = TaskStatus::factory()->create();
        $name = 'newName';
        $response = $this->actingAs($this->user)
                        ->put("/task_statuses/$taskStatus->id", [
            'name' => $name
        ]);

        $this->assertDatabaseHas('task_statuses', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testUpdateFail()
    {
        $taskStatus = TaskStatus::factory()->create();
        $name = 'newName';
        $response = $this->put("/task_statuses/$taskStatus->id", [
            'name' => $name
        ]);

        $this->assertDatabaseMissing('task_statuses', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyOk()
    {
        $taskStatus = TaskStatus::factory()->create();

        /** @var string $name */
        $name = $taskStatus->name;
        $response = $this->actingAs($this->user)
                         ->delete("/task_statuses/$taskStatus->id");

        $this->assertDatabaseMissing('task_statuses', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyFail()
    {
        $taskStatus = TaskStatus::factory()->create();

        /** @var string $name */
        $name = $taskStatus->name;
        $response = $this->delete("/task_statuses/$taskStatus->id");

        $this->assertDatabaseHas('task_statuses', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }
}
