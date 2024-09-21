<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    // Define the fields that are mass assignable
    protected $fillable = [
        'name',       // Certificate holder's name
        'surname',    // Certificate holder's surname
        'id_number',  // Certificate holder's ID number
        'template_id',  // Foreign key to the templates table
        'pdf_path',   // Path to the generated PDF (optional)
    ];

    // Define the relationship to the Template model
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
