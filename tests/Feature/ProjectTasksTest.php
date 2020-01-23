<?php

namespace Tests\Feature;
use App\Project;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_add_tasks()
    {
        $project = factory(Project::class)->create();
        $this->post($project->path() . '/tasks')->assertRedirect('/login');
    }

    public function test_user_cannot_add_tasks_to_other_users_project()
    {
        $this->signIn();
        $project = factory(Project::class)->create();
        $this->post($project->path() . '/tasks', 
                    [ 'body' => "Probando tarea en proyecto ajeno" ]
                   )
                   ->assertStatus(403);
        $this->assertDatabaseMissing('tasks', 
            [ 'body' => 'Probando tarea en proyecto ajeno' ]);
    }


        


    public function test_a_project_can_have_tasks()
    {
        //$this->withoutExceptionHandling();
        $this->signIn();
        //$project = factory(Project::class)->create(['owner_id' => \Auth::id()]);
        //Otra forma de hacer lo de arriba:
        $p = factory(Project::class)->raw();
        $project = \Auth::user()->projects()->create($p);
        $this->post($project->path() . '/tasks', [ 'body' => "Probando tareas" ]);
        $this->get($project->path())->assertSee('Probando tareas');

    }

    public function test_a_task_requires_a_body()
    {
        $this->signIn();
        $p = factory(Project::class)->raw();
        $project = \Auth::user()->projects()->create($p);
        $attributes = factory('App\Task')->raw(['body' => '']);
        $this->post($project->path() . '/tasks')->assertSessionHasErrors('body');
    }

        
}

