<?php

namespace App\Http\Livewire\Pages\Practitioners;
use Livewire\WithFileUploads;
use App\Models\Certification;
use Livewire\Component;

class FileUpload extends Component
{
    use WithFileUploads;

    public $pdf; // To hold the uploaded file

    protected $rules = [
        'pdf' => 'required|mimes:pdf|max:2048', // Restrict to PDF and max size 2MB
    ];

    public function save()
    {
        $this->validate();

        // Store the file
        $path = $this->pdf->store('pdfs', 'public'); // Store in 'storage/app/public/pdfs'

        // Save the file path and name in the database
        Certification::create([
            'practitioner_certificate_file_name' => $path,
        ]);

        // Reset input and send a success message
        $this->reset('pdf');
        session()->flash('message', 'PDF uploaded successfully!');
    }
    
    public function render()
    {
        return view('livewire.pages.practitioners.file-upload');
    }
}
