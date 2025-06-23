<?php

namespace App\Http\Livewire\Pages\Practitioners;

use Livewire\Component;
use App\Models\Certification;
use App\Models\Practitioner;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ViewCertificate extends Component
{
    public $param;
    public $certificate_details;
    public $pdfFileName;


    public function mount($param)
    {
        $this->param = $param;
        $this->certificate_details = Certification::where('id', $this->param)->first();
        $this->pdfFileName = 'cert_' 
            . strtolower(substr($this->certificate_details->practitioner->first_name, 0, 1)) 
            . strtolower(substr($this->certificate_details->practitioner->last_name, 0, 1)) 
            . '_' . $this->certificate_details->practitioner->id 
            . $this->certificate_details->id;
    }
    protected function generateQrCode()
    {
        return QrCode::size(150)->generate('https://pitahc.gov.ph/wp-content/'.$this->pdfFileName);
    }
    
    public function render()
    {
        return view('livewire.pages.practitioners.view-certificate', 
        [
            'qrCode' => $this->generateQrCode()
        ]);
    }
}
