<?php

namespace Tests\Feature;

use App\Models\Statistic;
use Tests\TestCase;
use App\Models\Task;

class TasksTest extends TestCase
{

    public function testCreateTask()
    {
        // Create task data
        $taskData = [
            'title' => 'Test Task',
            'description' => 'This is a test task which must be at least 100 characters long',
            'assign_by'=> 1,
            'assign_to'=> 101
        ];

        $response = $this->post('/tasks', $taskData);

        $response->assertStatus(302);
    }

    public function testViewTasks()
    {
        $response = $this->get('/tasks');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        $tasks = Task::all();
        foreach ($tasks as $task)
            $response->assertSee($task->title);
    }

    public function testViewStatistics()
    {
        $response = $this->get('/statistics');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        $stats = Statistic::all();
        foreach ($stats as $stat)
            $response->assertSee($stat->tasks_no);
    }
}
