<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * test
     */
    public function test_a_user_can_create_a_project() 
    {
        $attributes = factory('App\Project')->raw();
        //APUNTE
        //Factory: make() crea y retorna el objeto.
        //         create() lo crea, persiste en BD y retorna el objeto.
        //         raw() retorna solamente el array de los atributos.

        $this->post('/projects',$attributes)->assertRedirect('/projects');


        //See in database
        $this->assertDatabaseHas('projects', $attributes);
        
        //See in browser
        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function test_a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();
        $project = factory('App\Project')->create();
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function test_a_poject_requires_a_title()
    {
        $attributes = factory('App\Project')->raw([ 'title'=>'' ]);
        $this->post('/projects',$attributes)->assertSessionHasErrors('title');
    }
        
    public function test_a_poject_requires_a_description()
    {
        $attributes = factory('App\Project')->raw([ 'description'=>'' ]);
        $this->post('/projects',$attributes)->assertSessionHasErrors('description');
    }
        
    
}
