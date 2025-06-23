<?php

namespace App\Http\Livewire\Pages\Facilities;
use App\Models\Facility;
use App\Models\Accreditation;
use App\Models\StatusType;
use App\Models\Prefix;
use App\Models\Suffix;
use App\Models\SexType;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Country;
use App\Models\Barangay;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Exports\FacilitiesExport;

class ListFacilities extends Component
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
    public $SelectedStatusType = NULL;
    public $SelectedRegion = NULL;
    public $SelectedProvince = NULL;
    public $SelectedCity = NULL;
    //Data Input
    public $facility = NULL;
    public $facility_id = NULL;
    public $status_type_id = NULL;
    public $facility_name = NULL;
    public $prefix_id = NULL;
    public $last_name = NULL;
    public $first_name = NULL;
    public $middle_name = NULL;
    public $suffix_id = NULL;
    public $citizenship_id = NULL;
    public $sex_type_id = NULL;
    public $foreign_managed_status_type_id = FALSE;
    public $filipino_physician_prefix_id = NULL;
    public $filipino_physician_last_name = NULL;
    public $filipino_physician_first_name = NULL;
    public $filipino_physician_middle_name = NULL;
    public $filipino_physician_suffix_id = NULL;
    public $filipino_physician_prc_id_number = NULL;
    public $filipino_physician_prc_expiration_date = NULL;
    public $landline = NULL;
    public $mobile_number = NULL;
    public $business_number = NULL;
    public $email = NULL;
    public $region_id = NULL;
    public $province_id = NULL;
    public $city_id = NULL;
    public $barangay_id = NULL;
    public $address = NULL;
    //Delete
    public $password;


    protected $rules = 
    [
        'facility_name' => 'required',
        'prefix_id' => 'required',
        'last_name' => 'required',
        'first_name' => 'required',
        'sex_type_id' => 'required',
        'citizenship_id' => 'required',
        'filipino_physician_prefix_id' => 'required_if:foreign_managed_status_type_id,true',
        'filipino_physician_last_name' => 'required_if:foreign_managed_status_type_id,true',
        'filipino_physician_first_name' => 'required_if:foreign_managed_status_type_id,true',
        'filipino_physician_prc_id_number' => 'required_if:foreign_managed_status_type_id,true',
        'filipino_physician_prc_expiration_date' => 'required_if:foreign_managed_status_type_id,true',
    ];

    public function ClearFilter()
    {
        $this->search = NULL;
        $this->SelectedStatusType = NULL;
        $this->SelectedRegion = NULL;
        $this->SelectedProvince = NULL;
        $this->SelectedCity = NULL;
    }

    public function AddFormFacility()
    {  
        $this->ShowUpdateModal = 1;
        $this->facility_name = NULL;
        $this->prefix_id = NULL;
        $this->last_name = NULL;
        $this->first_name = NULL;
        $this->middle_name = NULL;
        $this->suffix_id = NULL;
        $this->sex_type_id = NULL;
        $this->citizenship_id = 608;
        $this->foreign_managed_status_type_id = NULL;
        $this->filipino_physician_prefix_id = NULL;
        $this->filipino_physician_last_name = NULL;
        $this->filipino_physician_first_name = NULL;
        $this->filipino_physician_middle_name = NULL;
        $this->filipino_physician_suffix_id = NULL;
        $this->filipino_physician_prc_id_number = NULL;
        $this->filipino_physician_prc_expiration_date = NULL;
        $this->landline = NULL;
        $this->mobile_number = NULL;
        $this->business_number = NULL;
        $this->email = NULL;
        $this->region_id = NULL;
        $this->province_id = NULL;
        $this->city_id = NULL;
        $this->barangay_id = NULL;
        $this->address = NULL;
        $this->dispatchBrowserEvent('show-facility-form');
    }

    public function InsertFacility()
    {
        $this->validate();        
        Facility::create([
            'status_type_id' => 1,
            'application_type_id' => 1,
            'facility_name' => strtoupper($this->facility_name),
            'prefix_id' => $this->prefix_id,
            'last_name' => strtoupper($this->last_name),
            'first_name' => strtoupper($this->first_name),
            'middle_name' => strtoupper($this->middle_name),
            'suffix_id' => $this->suffix_id,
            'sex_type_id' => $this->sex_type_id,
            'citizenship_id' => $this->citizenship_id,
            'foreign_managed_status_type_id' => $this->foreign_managed_status_type_id,
            'filipino_physician_prefix_id' => $this->filipino_physician_prefix_id,
            'filipino_physician_last_name' => strtoupper($this->filipino_physician_last_name),
            'filipino_physician_first_name' => strtoupper($this->filipino_physician_first_name),
            'filipino_physician_middle_name' => strtoupper($this->filipino_physician_middle_name),
            'filipino_physician_suffix_id' => $this->filipino_physician_suffix_id,
            'filipino_physician_prc_id_number' => $this->filipino_physician_prc_id_number,
            'filipino_physician_prc_expiration_date' => $this->filipino_physician_prc_expiration_date ? $this->filipino_physician_prc_expiration_date : NULL,
            'landline' => $this->landline,
            'mobile_number' => $this->mobile_number,
            'business_number' => $this->business_number,
            'email' => $this->email,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Facility Added Successfully!']);
        $this->search = NULL;
        return redirect()->back();
    }    

    public function editFacility(Facility $facility)
    {
        $this->facility = $facility;
        $this->ShowUpdateModal = 0;
        $this->facility_id = $facility->id;
        $this->facility_name = $facility->facility_name;
        $this->prefix_id = $facility->prefix_id;
        $this->last_name = $facility->last_name;
        $this->first_name = $facility->first_name;
        $this->middle_name = $facility->middle_name;
        $this->suffix_id = $facility->suffix_id;
        $this->citizenship_id = $facility->citizenship_id;
        $this->sex_type_id = $facility->sex_type_id;
        $this->foreign_managed_status_type_id = $facility->foreign_managed_status_type_id;
        $this->filipino_physician_prefix_id = $facility->filipino_physician_prefix_id;
        $this->filipino_physician_last_name = $facility->filipino_physician_last_name;
        $this->filipino_physician_first_name = $facility->filipino_physician_first_name;
        $this->filipino_physician_middle_name = $facility->filipino_physician_middle_name;
        $this->filipino_physician_suffix_id = $facility->filipino_physician_suffix_id;
        $this->filipino_physician_prc_id_number = $facility->filipino_physician_prc_id_number;
        $this->filipino_physician_prc_expiration_date = $facility->filipino_physician_prc_expiration_date;
        $this->landline = $facility->landline;
        $this->mobile_number = $facility->mobile_number;
        $this->business_number = $facility->business_number;
        $this->email = $facility->email;
        $this->region_id = $facility->region_id;
        $this->province_id = $facility->province_id;
        $this->city_id = $facility->city_id;
        $this->barangay_id = $facility->barangay_id;
        $this->address = $facility->address;
        $this->dispatchBrowserEvent('show-facility-form');
    }

    public function UpdateFacility()
    {
        $this->validate();
        $this->facility->update([
            'facility_name' => $this->facility_name,
            'prefix_id' => $this->prefix_id,
            'last_name' => strtoupper($this->last_name),
            'first_name' => strtoupper($this->first_name),
            'middle_name' => strtoupper($this->middle_name),
            'suffix_id' => $this->suffix_id,
            'sex_type_id' => $this->sex_type_id,
            'citizenship_id' => $this->citizenship_id,
            'foreign_managed_status_type_id' => $this->foreign_managed_status_type_id,
            'filipino_physician_prefix_id' => $this->filipino_physician_prefix_id,
            'filipino_physician_last_name' => strtoupper($this->filipino_physician_last_name),
            'filipino_physician_first_name' => strtoupper($this->filipino_physician_first_name),
            'filipino_physician_middle_name' => strtoupper($this->filipino_physician_middle_name),
            'filipino_physician_suffix_id' => $this->filipino_physician_suffix_id,
            'filipino_physician_prc_id_number' => $this->filipino_physician_prc_id_number,
            'filipino_physician_prc_expiration_date' => $this->filipino_physician_prc_expiration_date ? $this->filipino_physician_prc_expiration_date : NULL,
            'landline' => $this->landline,
            'mobile_number' => $this->mobile_number,
            'business_number' => $this->business_number,
            'email' => $this->email,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
            'updated_by' => Auth::id()
        ]);     
        $this->dispatchBrowserEvent('success-message', ['message' => 'Facility updated successfully!']);
        $this->search = NULL;
        return redirect()->back(); 
    }

    public function getFacilitiesProperty()
    { 
        return $this->facilitiesQuery
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate); 
    }
    
    public function getFacilitiesQueryProperty()
    {
        return Facility::with(['status_type', 'region', 'province', 'city'])
            ->when($this->SelectedStatusType, function ($query) {
                $query->where('status_type_id', $this->SelectedStatusType);
            })
            ->when($this->SelectedRegion, function ($query) {
                $query->where('region_id', $this->SelectedRegion);
            })
            ->when($this->SelectedProvince, function ($query) {
                $query->where('province_id', $this->SelectedProvince);
            })
            ->when($this->SelectedCity, function ($query) {
                $query->where('city_id', $this->SelectedCity);
            })
            ->search(trim($this->search));
    }
    
    public function render()
    {
        return view('livewire.pages.facilities.list-facilities', [
            'facilities' => $this->facilities,
            'status_types' => StatusType::all(),
            'regions' => Region::all(),
            'provinces' => Province::where("region_id", $this->SelectedRegion)->orderBy('province_name', 'asc')->get(),
            'cities' => City::where("province_id", $this->SelectedProvince)->orderBy('city_name', 'asc')->get(),
            'prefixes' => Prefix::all(),
            'suffixes' => Suffix::all(),
            'citizenships' => Country::all(),
            'sex_types' => SexType::all(),
            'business_regions' => Region::all(),
            'business_provinces' => Province::where("region_id", $this->region_id)->orderBy('province_name', 'asc')->get(),
            'business_cities' => City::where("province_id", $this->province_id)->orderBy('city_name', 'asc')->get(),
            'business_barangays' => Barangay::where("city_id", $this->city_id)->orderBy('barangay_name', 'asc')->get(),
        ]);
    }

     public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->facilities->pluck('id')->map(fn ($item) => (string) $item)->toArray();
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
        $this->checked = $this->facilitiesQuery
        ->pluck('id')
        ->map(fn ($item) => (string) $item)
        ->toArray();     
    }

    // public function deleteRecords()
    // {
    //     Facility::whereKey($this->checked)->delete();
    //     $this->checked = [];
    //     $this->selectAll = false;
    //     $this->selectPage = false;
    //     session()->flash('info', 'Selected Records were deleted Successfully');
    // }

    public function exportSelected()
    {
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $currentDay = $currentDate->day;
        return (new FacilitiesExport($this->checked))->download('Facilities-'.$currentYear.'-'.$currentMonth.'-'.$currentDay.'.xlsx');
    }

    public function confirmDelete($facility_id)
    {
        $this->facility_id = $facility_id;
        $this->password = '';
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteWithPassword()
    {
        $this->validate([
            'password' => 'required',
        ]);
        if (Hash::check($this->password, Auth::user()->password)) {
            $facility = Facility::findOrFail($this->facility_id);
            $facility->delete();
            $accreditation = Accreditation::where('facility_id', $this->facility_id)->first();
            if ($accreditation) {
                $accreditation->delete();
            }
            $this->checked = array_diff($this->checked, [$this->facility_id]);
            $this->dispatchBrowserEvent('success-message', ['message' => 'Record Deleted successfully!']);
            return redirect()->back();
        } else {
            $this->dispatchBrowserEvent('error-message', ['message' => 'Incorrect Password']);
        }
    }

    public function isChecked($facility_id)
    {
        return in_array($facility_id, $this->checked);
    }  
}
