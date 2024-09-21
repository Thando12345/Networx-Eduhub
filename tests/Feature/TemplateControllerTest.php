<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Template;
use App\Models\Certificate;

class CertificateGenerationTest extends TestCase
{
    use RefreshDatabase;
    public function test_certificate_generation_form_submission()
    {
        // Create a Template instance using the factory
        $template = \App\Models\Template::factory()->create();
    
        // Test the certificate generation
        $response = $this->post(route('admin.certificates.generate'), [
            'template_id' => $template->id,
            'name' => 'John',
            'surname' => 'Doe',
            'id_number' => '1234567890',
        ]);
    
        // Assert that the response is a redirect
        $response->assertStatus(302);
    
        // Assert that the session has the success message
        $response->assertSessionHas('success', 'Certificate generated successfully!');
    }
    
    
}
