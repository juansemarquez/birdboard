<?php

namespace Tests\Unit;

use App\Task;
use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_project()
    {
       $task = factory(Task::class)->create();
       $this->assertInstanceOf(Project::class, $task->project);
    }

    public function test_it_has_a_path()
    {
        $task = factory(Task::class)->create();
        $pathEsperado = '/projects/' . $task->project->id . '/tasks/' . $task->id;
        $this->assertEquals($pathEsperado, $task->path());
       
    }
}
