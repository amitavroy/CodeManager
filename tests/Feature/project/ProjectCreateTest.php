<?php

namespace Tests\Feature\project;

use App\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProjectCreateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_see_create_project_page()
    {
        $this->get(route('project-add'))
            ->assertStatus(200)
            ->assertSee('Create new project');
    }

    /** @test */
    public function a_user_can_create_project()
    {
        $response = $this->post(route('project-save'), [
            'name' => 'Dummy test',
            'git_url' => 'https://gitlab@com.com'
        ]);

        $response->assertStatus(201);

        $project = Project::where('name', 'Dummy test')->first();
        $this->assertNotNull($project);
        $this->assertEquals(true, $project->is_active);
    }

    /** @test */
    public function a_project_name_is_mandatory()
    {
        $response = $this->json('POST', route('project-save'), [
            'git_url' => 'https://gitlab@com.com'
        ]);

        $this->assertValidationError('name', $response);
    }

    /** @test */
    public function a_project_url_is_mandatory()
    {
        $response = $this->json('POST', route('project-save'), [
            'name' => 'Bob the builder'
        ]);

        $this->assertValidationError('git_url', $response);
    }
}
