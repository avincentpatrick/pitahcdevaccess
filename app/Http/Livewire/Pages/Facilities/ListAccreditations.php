<?php

namespace App\Http\Livewire\Pages\Facilities;

use App\Models\ViewAccreditation;
use App\Models\FacilityType;
use App\Models\Modality;
use App\Models\ModalityClass;
use Livewire\WithPagination;
use App\Exports\AccreditationsExport;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;

class ListAccreditations extends Component
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
    public $SelectedStatusType = NULL;
    public $SelectedFacilityType = NULL;

    public function getAccreditationsProperty()
    { 
        return $this->accreditationsQuery
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate); 
    }
    
    public function getAccreditationsQueryProperty()
    {
        return ViewAccreditation::with(['status_type', 'facility_type', 'modality', 'modality_class'])
            ->when($this->SelectedStatusType, function ($query) {
                $query->where('status_type_id', $this->SelectedStatusType);
            })
            ->when($this->SelectedFacilityType, function ($query) {
                $query->where('facility_type_id', $this->SelectedFacilityType);
            })
            ->when($this->SelectedModality, function ($query) {
                $query->where('modality_id', $this->SelectedModality);
            })
            ->when($this->SelectedModalityClass, function ($query) {
                $query->where('modality_class_id', $this->SelectedModalityClass);
            })
            ->search(trim($this->search));
    }

    public function render()
    {
        return view('livewire.pages.facilities.list-accreditations', [
            'accreditations' => $this->accreditations,
            'facility_types' => FacilityType::all(),
            'modalities' => Modality::all(),
            'modality_classes' => ModalityClass::where('modality_type_id', '2')->where('modality_id', $this->SelectedModality)->get(),
        ]);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->accreditations->pluck('aid')->map(fn ($item) => (string) $item)->toArray();
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
        $this->checked = $this->accreditationsQuery
        ->pluck('aid')
        ->map(fn ($item) => (string) $item)
        ->toArray();     
    }

    public function exportSelected()
    {
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $currentDay = $currentDate->day;
        return (new AccreditationsExport($this->checked))->download('Accreditations-'.$currentYear.'-'.$currentMonth.'-'.$currentDay.'.xlsx');
    }

    public function isChecked($accreditation_id)
    {
        return in_array($accreditation_id, $this->checked);
    } 
}
