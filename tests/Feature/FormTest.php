<?php
namespace Tests\Feature;
use App\Models\Submission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormTest extends TestCase {
    use RefreshDatabase;

    public function test_form_submission() {
        $response = $this->post('/en/submit', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'metrics' => 'Process efficiency: 80%',
        ]);

        $response->assertStatus(302)->assertRedirectToRoute('landing');
        $this->assertDatabaseHas('submissions', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }
}