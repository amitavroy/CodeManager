<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProjectListTest extends TestCase
{
    use DatabaseMigrations;
    
    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_guest_will_not_see_project_list()
    {
        $this->get(route('project-list'))
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_logged_in_user_can_see_project_list()
    {
        $project = factory(Project::class)->create();

        $this->actingAs($this->user)
            ->get(route('project-list'))
            ->assertStatus(200)
            ->assertSee('List of projects')
            ->assertSee($project->name)
            ->assertSee($project->git_url);
    }
}
