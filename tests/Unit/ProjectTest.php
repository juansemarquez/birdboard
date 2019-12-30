<?php

namespace Tests\Unit;

use Tests\TestCase;
//APUNTE: Ojo: El make de artisan me usa la original de PHPUnit.

use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_has_a_path()
    {
        $project = factory('App\Project')->create();
        $this->assertEquals('/projects/' . $project->id, $project->path());
    }
    
}

