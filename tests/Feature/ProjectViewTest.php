<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProjectViewTest extends TestCase
{
    use DatabaseMigrations;

    private $project;
    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->project = factory(Project::class)->create();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_guest_should_not_see_project_view_page()
    {
        $this->get(route('project-view', $this->project->id))
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_logged_in_user_should_see_project_details()
    {
        $this->disableExceptionHandling();
        $this->actingAs($this->user)
            ->get(route('project-view', $this->project->id))
            ->assertStatus(200)
            ->assertSee($this->project->name);
    }
}
