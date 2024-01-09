<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\Ideas\CreateIdea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;


    public function test_create_idea_form_not_showing_when_not_authenticated()
    {
        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertDontSee('Let us know what you would like and we\'ll take a look over!', false);
        $response->assertSee('Please login to create an idea.');
    }
    public function test_create_idea_form_show_when_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee('Let us know what you would like and we\'ll take a look over!', false);
        $response->assertDontSee('Please login to create an idea.');
    }

    public function test_home_page_has_create_idea_component()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('idea.index'));
        $response->assertSeeLivewire('ideas.create-idea');
    }

    public function test_create_idea_form_validation_works()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('title field is required');
    }

    public function test_creating_idea_works_correctly()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        Status::factory()->create(['name' => 'Open']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('create')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('title field is required')
            ->set('title', 'My new idea')
            ->set('category', $category->id)
            ->set('description', 'My new idea description')
            ->call('create')
            ->assertDispatched('idea-created');

        $response = $this->actingAs($user)->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('My new idea');
        $response->assertSee('My new idea description');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My new idea',
            'description' => 'My new idea description',
            'category_id' => $category->id
        ]);
    }
}
