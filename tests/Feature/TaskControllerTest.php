<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Task;
use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
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
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }


    public function testCreateFail()
    {
        $response = $this->get('/tasks/create');

        $response->assertStatus(302);

        $response->assertRedirect('/tasks');
    }


    public function testCreateOk()
    {
        $response = $this->actingAs($this->user)->get('/tasks/create');

        $response->assertStatus(200);
    }


    public function testEditOk()
    {
        $task = Task::factory()->create();
        $response = $this->actingAs($this->user)->get("/tasks/$task->id/edit");

        $response->assertStatus(200);
    }


    public function testEditFail()
    {
        $taskStatus = Task::factory()->create();
        $response = $this->get("/tasks/$taskStatus->id/edit");

        $response->assertStatus(302);
        $response->assertRedirect('/tasks');
    }


    public function testStoreOk()
    {
        $name = 'qwerty';
        $status = TaskStatus::factory()->create();
        $response = $this->actingAs($this->user)->post('/tasks', [
            'name' => $name,
            'description' => 'asdf',
            'status_id' => $status->id,
            'assigned_to_id' => $this->user->id
        ]);

        $this->assertDatabaseHas('tasks', [
            'name' => $name,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/tasks');
    }


    public function testStoreFail()
    {
        $name = 'qwerty';
        $status = TaskStatus::factory()->create();
        $response = $this->post('/tasks', [
            'name' => $name,
            'description' => 'asdf',
            'status_id' => $status->id,
            'assigned_to_id' => $this->user->id
        ]);

        $this->assertDatabaseMissing('tasks', [
            'name' => $name,
        ]);

        $response->assertStatus(302);
    }


    public function testUpdateOk()
    {
        $status = TaskStatus::factory()->create();
        $task = Task::factory()->create();
        $label = Label::factory()->count(3)->make();
        $name = 'newName';
        $response = $this->actingAs($this->user)->put("/tasks/$task->id", [
            'name' => $name,
            'description' => 'new description',
            'status_id' => $status->id,
            'assigned_to_id' => $this->user->id,
            'labels' => [1,2]
        ]);

        $this->assertDatabaseHas('tasks', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testUpdateFail()
    {
        $status = Task::factory()->create();
        $task = Task::factory()->create();
        $name = 'newName';
        $response = $this->put("/tasks/$task->id", [
            'name' => $name,
            'description' => 'new description',
            'status_id' => $status->id,
            'assigned_to_id' => $this->user->id
        ]);

        $this->assertDatabaseMissing('tasks', [
            'name' => $name,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyOk()
    {
        $task = Task::factory()->create();
        /** @var integer $created_by_id */
        $created_id = $task->created_by_id;
        $user = User::find($created_id);
        $id = $task->id;
        $response =  $this->actingAs($user)->delete("/tasks/$id");

        $this->assertDatabaseMissing('tasks', [
            'id' => $id,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyWrongUserFail()
    {
        $task = Task::factory()->create();
        $id = $task->id;

        $response = $this->actingAs($this->user)->delete("/tasks/$task->id");

        $this->assertDatabaseHas('tasks', [
            'id' => $id,
        ]);
        $response->assertStatus(302);
    }


    public function testDestroyNotAuthFail()
    {
        $task = Task::factory()->create();
        $id = $task->id;

        $response = $this->delete("/tasks/$task->id");

        $this->assertDatabaseHas('tasks', [
            'id' => $id,
        ]);
        $response->assertStatus(302);
    }
}
