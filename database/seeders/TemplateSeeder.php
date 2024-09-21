<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed templates
        Template::create([
            'name' => 'Networx Template',
            'path' => 'templates/Networx_Template.png', // Updated path to the image file
        ]);

        // Add other templates if needed
        Template::create([
            'name' => 'Sample Template 1',
            'path' => 'templates/sample-template1.pdf', // Ensure this path exists or upload a sample file
        ]);

        Template::create([
            'name' => 'Sample Template 2',
            'path' => 'templates/sample-template2.pdf', // Ensure this path exists or upload a sample file
        ]);
    }
}
