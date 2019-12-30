<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * test
     */
    public function test_a_user_can_create_a_project() 
    {
        $this->withoutExceptionHandling(); 
        //$attributes = factory('App\Project')->raw();
        //APUNTE
        //Factory: make() crea y retorna el objeto.
        //         create() lo crea, persiste en BD y retorna el objeto.
        //         raw() retorna solamente el array de los atributos.
        $attributes = [ 'title' => 'asdfghh', 'description' => 'asdasdsa' ];


        $this->actingAs(factory('App\User')->create());


        $this->post('/projects',$attributes)->assertRedirect('/projects');


        //See in database
        $this->assertDatabaseHas('projects', $attributes);
        
        //See in browser
        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function test_a_user_can_view_her_project()
    {
        //$this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());
        $project = factory('App\Project')->create(['owner_id' => Auth::id()]);
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function test_a_poject_requires_a_title()
    {
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Project')->raw([ 'title'=>'' ]);
        $this->post('/projects',$attributes)->assertSessionHasErrors('title');
    }
        
    public function test_a_poject_requires_a_description()
    {
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Project')->raw([ 'description'=>'' ]);
        $this->post('/projects',$attributes)->assertSessionHasErrors('description');
    }
        
    public function test_guests_may_not_create_project()
    {
        //$this->withoutExceptionHandling();
        //$attributes = factory('App\Project')->raw(['owner_id' => null]);
        $attributes = factory('App\Project')->raw();
        //$this->post('/projects',$attributes)->assertSessionHasErrors('owner_id');
        $this->post('/projects',$attributes)->assertRedirect('login');
    }
    
    public function test_guests_may_not_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }
    
    public function test_guests_may_not_view_a_project()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    public function test_an_authenticated_user_cannot_view_the_projects_of_others()
    {
        //$this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());
        $project = factory('App\Project')->create();
        $this->get($project->path())->assertStatus(403);
    }
}
