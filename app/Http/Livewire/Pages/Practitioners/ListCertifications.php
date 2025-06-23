<?php

namespace App\Http\Livewire\Pages\Practitioners;

use App\Models\ViewCertification;
use App\Models\SexType;
use App\Models\Modality;
use App\Models\ModalityClass;
use Livewire\WithPagination;
use App\Exports\CertificationsExport;

use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;

class ListCertifications extends Component
{
    use WithFileUploads;   
    use WithPagination;
    //Page
    public $paginate = 10;
    public $searchInput;
    protected $searchList;
    protected $pagination = 5;
    public $search = "";
    public $selectPage = false;
    public $checked = [];
    public $selectAll = false;
    
    
    //Filter
    public $SelectedModality = NULL;
    public $SelectedModalityClass = NULL;
    public $SelectedSexType = NULL;
    public $SelectedStatusType = NULL;

    public function getCertificationsProperty()
    { 
        return $this->certificationsQuery
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate); 
    }
    
    public function getCertificationsQueryProperty()
    {
        return ViewCertification::with(['status_type', 'modality', 'modality_class', 'sex_type'])
            ->when($this->SelectedStatusType, function ($query) {
                $query->where('status_type_id', $this->SelectedStatusType);
            })
            ->when($this->SelectedModality, function ($query) {
                $query->where('modality_id', $this->SelectedModality);
            })
            ->when($this->SelectedModalityClass, function ($query) {
                $query->where('modality_class_id', $this->SelectedModalityClass);
            })
            ->when($this->SelectedSexType, function ($query) {
                $query->where('sex_type_id', $this->SelectedSexType);
            })
            ->search(trim($this->search));
    }

    public function render()
    {
        return view('livewire.pages.practitioners.list-certifications', [
            'certifications' => $this->certifications,
            'sex_types' => SexType::all(),
            'modalities' => Modality::all(),
            'modality_classes' => ModalityClass::where('modality_type_id', '1')->where('modality_id', $this->SelectedModality)->get(),
        ]);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->certifications->pluck('cid')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->certificationsQuery
        ->pluck('cid')
        ->map(fn ($item) => (string) $item)
        ->toArray();     
    }

    public function exportSelected()
    {
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $currentDay = $currentDate->day;
        return (new CertificationsExport($this->checked))->download('Certifications-'.$currentYear.'-'.$currentMonth.'-'.$currentDay.'.xlsx');
    }

    public function isChecked($certification_id)
    {
        return in_array($certification_id, $this->checked);
    }  
}
