<?php

namespace App\Http\Livewire\Pages\Practitioners;

use App\Models\Practitioner;
use App\Models\Certification;
use App\Models\Education;
use App\Models\LicensureExamination;
use App\Models\WorkExperience;
use App\Models\Training;
use App\Models\StatusType;
use App\Models\Prefix;
use App\Models\Suffix;
use App\Models\Response;
use App\Models\Country;
use App\Models\SexType;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use App\Models\Modality;
use App\Models\ModalityClass;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\PractitionersExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class ListPractitioners extends Component
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
    public $ShowUpdateModal = NULL;
    //Filter
    public $SelectedModality = NULL;
    public $SelectedModalityClass = NULL;
    public $SelectedRegion = NULL;
    public $SelectedProvince = NULL;
    public $SelectedCity = NULL;
    public $SelectedBarangay = NULL;
    public $SelectedCitizenship = NULL;
    public $SelectedSexType = NULL;
    public $SelectedStatusType = NULL;
    //Data Input
    public $practitioner = NULL;
    public $practitioner_id = NULL;
    public $modality_id = NULL;
    public $status_type_id = NULL;
    public $photo_file_name = NULL;
    public $prefix_id = NULL;
    public $last_name = NULL;
    public $first_name = NULL;
    public $middle_name = NULL;
    public $suffix_id = NULL;
    public $birth_date = NULL;
    public $birth_place = NULL;
    public $citizenship_status_type_id = FALSE;
    public $primary_citizenship_id = NULL;
    public $secondary_citizenship_id = NULL;
    public $sex_type_id = NULL;
    public $landline = NULL;
    public $mobile_number = NULL;
    public $business_number = NULL;
    public $email = NULL;
    public $residential_region_id = NULL;
    public $residential_province_id = NULL;
    public $residential_city_id = NULL;
    public $residential_barangay_id = NULL;
    public $residential_address = NULL;
    public $business_region_id = NULL;
    public $business_province_id = NULL;
    public $business_city_id = NULL;
    public $business_barangay_id = NULL;
    public $business_address = NULL;

    public $photo_preview_url;
    //Delete
    public $password;

    protected $rules = 
    [
        'prefix_id' => 'required',
        'last_name' => 'required',
        'first_name' => 'required',
        'sex_type_id' => 'required',
        'birth_date' => 'required',
        'primary_citizenship_id' => 'required',
        'secondary_citizenship_id' => 'required_if:citizenship_status_type_id,true',
    ];

    public function checkDuplicatePractitioner()
    {
        return Practitioner::where('last_name', strtoupper($this->last_name))
            ->where('first_name', strtoupper($this->first_name))
            ->exists();
    }

    public function ClearFilter()
    {
        $this->search = NULL;
        $this->SelectedStatusType = NULL;
        $this->SelectedSexType = NULL;
        $this->SelectedRegion = NULL;
        $this->SelectedProvince = NULL;
        $this->SelectedCity = NULL;
        $this->SelectedBarangay = NULL;

    }

    public function AddFormPractitioner()
    {  
        $this->ShowUpdateModal = 1;
        $this->photo_file_name = NULL;
        $this->prefix_id = NULL;
        $this->last_name = NULL;
        $this->first_name = NULL;
        $this->middle_name = NULL;
        $this->suffix_id = NULL;
        $this->birth_date = NULL;
        $this->birth_place = NULL;
        $this->citizenship_status_type_id = FALSE;
        $this->primary_citizenship_id = 608;
        $this->secondary_citizenship_id = NULL;
        $this->sex_type_id = NULL;
        $this->landline = NULL;
        $this->mobile_number = NULL;
        $this->business_number = NULL;
        $this->email = NULL;
        $this->residential_region_id = NULL;
        $this->residential_province_id = NULL;
        $this->residential_city_id = NULL;
        $this->residential_barangay_id = NULL;
        $this->residential_address = NULL;
        $this->business_region_id = NULL;
        $this->business_province_id = NULL;
        $this->business_city_id = NULL;
        $this->business_barangay_id = NULL;
        $this->business_address = NULL;
        $this->dispatchBrowserEvent('show-practitioner-form');
        $this->dispatchBrowserEvent('reset-file-upload');
    }

    public function InsertPractitioner()
    {
        $this->validate();
        // Check for duplicates
        if ($this->checkDuplicatePractitioner()) {
            $this->dispatchBrowserEvent('error-message', ['message' => 'Practitioner Already Exist!']);
            $this->search = NULL;
            return redirect()->back(); 
        }
        $store_filename = strtoupper($this->last_name).'_'.strtoupper($this->first_name).'.pdf';
        $photo_file_name = $this->photo_file_name ? $this->photo_file_name->storeAs('ID PHOTO', $store_filename) : NULL;
        
        Practitioner::create([
            'status_type_id' => 1,
            'application_type_id' => 1,
            'photo_file_name' => $photo_file_name ? $photo_file_name : NULL,
            'prefix_id' => $this->prefix_id,
            'last_name' => strtoupper($this->last_name),
            'first_name' => strtoupper($this->first_name),
            'middle_name' => strtoupper($this->middle_name),
            'suffix_id' => $this->suffix_id,
            'sex_type_id' => $this->sex_type_id,
            'birth_date' => $this->birth_date ? $this->birth_date : NULL,
            'birth_place' => $this->birth_place,
            'citizenship_status_type_id' => $this->citizenship_status_type_id == true ? '1' : NULL,
            'primary_citizenship_id' => $this->primary_citizenship_id,
            'secondary_citizenship_id' => $this->secondary_citizenship_id,
            'landline' => $this->landline,
            'mobile_number' => $this->mobile_number,
            'business_number' => $this->business_number,
            'email' => $this->email,
            'residential_region_id' => $this->residential_region_id,
            'residential_province_id' => $this->residential_province_id,
            'residential_city_id' => $this->residential_city_id,
            'residential_barangay_id' => $this->residential_barangay_id,
            'residential_address' => $this->residential_address,
            'business_region_id' => $this->business_region_id,
            'business_province_id' => $this->business_province_id,
            'business_city_id' => $this->business_city_id,
            'business_barangay_id' => $this->business_barangay_id,
            'business_address' => $this->business_address,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Practitioner Added Successfully!']);
        $this->search = NULL;
        return redirect()->back();
    }

    public function editPractitioner(Practitioner $practitioner)
    {
        $this->practitioner = $practitioner;
        $this->ShowUpdateModal = 0;
        $this->practitioner_id = $practitioner->id;
        $this->photo_file_name = $practitioner->photo_file_name;
        $this->prefix_id = $practitioner->prefix_id;
        $this->last_name = $practitioner->last_name;
        $this->first_name = $practitioner->first_name;
        $this->middle_name = $practitioner->middle_name;
        $this->suffix_id = $practitioner->suffix_id;
        $this->birth_date = $practitioner->birth_date ? $practitioner->birth_date : NULL;
        $this->birth_place = $practitioner->birth_place;
        $this->citizenship_status_type_id = $practitioner->citizenship_status_type_id;
        $this->primary_citizenship_id = $practitioner->primary_citizenship_id;
        $this->secondary_citizenship_id = $practitioner->secondary_citizenship_id;
        $this->sex_type_id = $practitioner->sex_type_id;
        $this->landline = $practitioner->landline;
        $this->mobile_number = $practitioner->mobile_number;
        $this->business_number = $practitioner->business_number;
        $this->email = $practitioner->email;
        $this->residential_region_id = $practitioner->residential_region_id;
        $this->residential_province_id = $practitioner->residential_province_id;
        $this->residential_city_id = $practitioner->residential_city_id;
        $this->residential_barangay_id = $practitioner->residential_barangay_id;
        $this->residential_address = $practitioner->residential_address;
        $this->business_region_id = $practitioner->business_region_id;
        $this->business_province_id = $practitioner->business_province_id;
        $this->business_city_id = $practitioner->business_city_id;
        $this->business_barangay_id = $practitioner->business_barangay_id;
        $this->business_address = $practitioner->business_address;
        $this->dispatchBrowserEvent('show-practitioner-form');
        $this->dispatchBrowserEvent('reset-file-upload');
    }

    public function UpdatePractitioner()
    {
        $this->validate();
        $this->practitioner->update([
            'photo_file_name' => $this->photo_file_name,
            'prefix_id' => $this->prefix_id,
            'last_name' => strtoupper($this->last_name),
            'first_name' => strtoupper($this->first_name),
            'middle_name' => strtoupper($this->middle_name),
            'suffix_id' => $this->suffix_id,
            'sex_type_id' => $this->sex_type_id,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'citizenship_status_type_id' => $this->citizenship_status_type_id == true ? '1' : NULL,
            'primary_citizenship_id' => $this->primary_citizenship_id,
            'secondary_citizenship_id' => $this->secondary_citizenship_id,
            'landline' => $this->landline,
            'mobile_number' => $this->mobile_number,
            'business_number' => $this->business_number,
            'email' => $this->email,
            'residential_region_id' => $this->residential_region_id,
            'residential_province_id' => $this->residential_province_id,
            'residential_city_id' => $this->residential_city_id,
            'residential_barangay_id' => $this->residential_barangay_id,
            'residential_address' => $this->residential_address,
            'business_region_id' => $this->business_region_id,
            'business_province_id' => $this->business_province_id,
            'business_city_id' => $this->business_city_id,
            'business_barangay_id' => $this->business_barangay_id,
            'business_address' => $this->business_address,
            'updated_by' => Auth::id()
        ]);     
        $this->dispatchBrowserEvent('success-message', ['message' => 'Practitioner updated successfully!']);
        $this->search = NULL;
        return redirect()->back(); 
    }

    public function getPractitionersProperty()
    { 
        return $this->practitionersQuery
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate); 
    }
    
    public function getPractitionersQueryProperty()
    {
        return Practitioner::with(['status_type', 'sex_type', 'region', 'province', 'city', 'barangay'])
            ->when($this->SelectedRegion, function ($query) {
                $query->where('residential_region_id', $this->SelectedRegion);
            })
            ->when($this->SelectedProvince, function ($query) {
                $query->where('residential_province_id', $this->SelectedProvince);
            })
            ->when($this->SelectedCity, function ($query) {
                $query->where('residential_city_id', $this->SelectedCity);
            })
            ->when($this->SelectedBarangay, function ($query) {
                $query->where('residential_barangay_id', $this->SelectedBarangay);
            })
            ->when($this->SelectedStatusType, function ($query) {
                $query->where('status_type_id', $this->SelectedStatusType);
            })
            ->when($this->SelectedSexType, function ($query) {
                $query->where('sex_type_id', $this->SelectedSexType);
            })
            ->search(trim($this->search));
    }
    
    public function render()
    {
        return view('livewire.pages.practitioners.list-practitioners', [
            'practitioners' => $this->practitioners,
            'status_types' => StatusType::all(),
            'modalities' => Modality::all(),
            'modality_classes' => ModalityClass::where('modality_id', $this->SelectedModality)->where('modality_type_id', 1)->orderBy('modality_class_name', 'asc')->get(),
            'form_modality_classes' => ModalityClass::where('modality_id', $this->modality_id)->where('modality_type_id', 1)->orderBy('modality_class_name', 'asc')->get(),
            'prefixes' => Prefix::all(),
            'suffixes' => Suffix::all(),
            'responses' => Response::all(),
            'citizenships' => Country::all(),
            'sex_types' => SexType::all(),
            'residential_regions' => Region::all(),
            'residential_provinces' => Province::where("region_id", $this->residential_region_id)->orderBy('province_name', 'asc')->get(),
            'residential_cities' => City::where("province_id", $this->residential_province_id)->orderBy('city_name', 'asc')->get(),
            'residential_barangays' => Barangay::where("city_id", $this->residential_city_id)->orderBy('barangay_name', 'asc')->get(),
            'business_regions' => Region::all(),
            'business_provinces' => Province::where("region_id", $this->business_region_id)->orderBy('province_name', 'asc')->get(),
            'business_cities' => City::where("province_id", $this->business_province_id)->orderBy('city_name', 'asc')->get(),
            'business_barangays' => Barangay::where("city_id", $this->business_city_id)->orderBy('barangay_name', 'asc')->get(),
            'regions' => Region::all(),
            'provinces' => Province::where("region_id", $this->SelectedRegion)->orderBy('province_name', 'asc')->get(),
            'cities' => City::where("province_id", $this->SelectedProvince)->orderBy('city_name', 'asc')->get(),
            'barangays' => Barangay::where("city_id", $this->SelectedCity)->orderBy('barangay_name', 'asc')->get(),
        ]);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->practitioners->pluck('id')->map(fn ($item) => (string) $item)->toArray();
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

        $this->checked = $this->practitionersQuery
        ->pluck('id')
        ->map(fn ($item) => (string) $item)
        ->toArray();     
    }

    public function exportSelected()
    {
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $currentDay = $currentDate->day;
        return (new PractitionersExport($this->checked))->download('Practitioners-'.$currentYear.'-'.$currentMonth.'-'.$currentDay.'.xlsx');
    }

    public function confirmDelete($practitioner_id)
    {
        $this->practitioner_id = $practitioner_id;
        $this->password = '';
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteWithPassword()
    {
        $this->validate([
            'password' => 'required',
        ]);
        if (Hash::check($this->password, Auth::user()->password)) {
            $practitioner = Practitioner::findOrFail($this->practitioner_id);
            $practitioner->delete();
            $certification = Certification::where('practitioner_id', $this->practitioner_id)->first();
            if ($certification) {
                $certification->delete();
            }
            $education = Education::where('practitioner_id', $this->practitioner_id)->first();
            if ($education) {
                $education->delete();
            }
            $licensure_examination = LicensureExamination::where('practitioner_id', $this->practitioner_id)->first();
            if ($licensure_examination) {
                $licensure_examination->delete();
            }
            $work_experience = WorkExperience::where('practitioner_id', $this->practitioner_id)->first();
            if ($work_experience) {
                $work_experience->delete();
            }
            $training = Training::where('practitioner_id', $this->practitioner_id)->first();
            if ($training) {
                $training->delete();
            }
            $this->checked = array_diff($this->checked, [$this->practitioner_id]);
            $this->dispatchBrowserEvent('success-message', ['message' => 'Record Deleted successfully!']);
            return redirect()->back();
        } else {
            $this->dispatchBrowserEvent('error-message', ['message' => 'Incorrect Password']);
        }
    }

    public function isChecked($practitioner_id)
    {
        return in_array($practitioner_id, $this->checked);
    }  

    public function updatedPhotoFileName()
    {
        if ($this->photo_file_name) {
            $this->photo_preview_url = $this->photo_file_name->temporaryUrl();
        }
    }

    public function download($id)
    {      
        $data = Practitioner::where('id', $id)->first();
        $filepath = storage_path("app/{$data->photo_file_name}");
        $content=file_get_contents($filepath);
        return response($content)->withHeaders([
            'Content-Type' => mime_content_type($filepath)
        ]);
    }
}
