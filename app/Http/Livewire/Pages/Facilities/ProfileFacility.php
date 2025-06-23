<?php

namespace App\Http\Livewire\Pages\Facilities;

use Livewire\Component;
use App\Models\Facility;
use App\Models\Accreditation;
use App\Models\Prefix;
use App\Models\Suffix;
use App\Models\SexType;
use App\Models\Country;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use App\Models\Modality;
use App\Models\ModalityClass;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Carbon\Carbon;

class ProfileFacility extends Component
{
    public $param;
    public $ShowUpdateModal = NULL;
    public $facility_details = NULL;
    //facility profile
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
    //modalities
    public $active_accreditation_acupuncture;
    public $active_accreditation_chiro;
    public $active_accreditation_hilot;
    public $active_accreditation_homeo;
    public $active_accreditation_naturopath;
    public $active_accreditation_osteopath;
    public $active_accreditation_tcm;
    public $active_accreditation_tuina;
    public $active_accreditation_anthro;
    public $active_accreditation_ayurveda;
    //accreditation
    public $accreditation_code = NULL;
    public $currentEntryDate = NULL;
    public $modality_class_id = NULL;
    public $entry_date = NULL;
    public $application_date = NULL;
    public $expiration_date = NULL;

    public $accreditation;
    public $currentModalityID;
    public $currentAccreditationID;
    public $currentApplicationSubTypeID;

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
    public function mount($param)
    {
        $this->param = $param;
        $this->facility_details = Facility::where('id', $this->param)->first();
        $this->active_accreditation_acupuncture = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '1');
        })
        ->first();
        $this->active_accreditation_chiro = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '2');
        })
        ->first();
        $this->active_accreditation_hilot = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '3');
        })
        ->first();
        $this->active_accreditation_homeo = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '4');
        })
        ->first();
        $this->active_accreditation_naturopath = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '5');
        })
        ->first();
        $this->active_accreditation_osteopath = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '6');
        })
        ->first();
        $this->active_accreditation_tcm = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '7');
        })
        ->first();
        $this->active_accreditation_tuina = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '8');
        })
        ->first();
        $this->active_accreditation_anthro = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '9');
        })
        ->first();
        $this->active_accreditation_ayurveda = Accreditation::where('facility_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '10');
        })
        ->first();
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
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);     
        $this->dispatchBrowserEvent('success-message', ['message' => 'Facility updated successfully!']);
        return redirect()->back(); 
    }

    public function AddAccreditation()
    {
        $this->ShowUpdateModal = 1;
        $this->accreditation_code = NULL;
        $this->modality_class_id = NULL;
        $this->application_date = NULL;
        $this->entry_date = NULL;
        $this->dispatchBrowserEvent('show-accreditation-form');
    }

    public function InsertAccreditation()
    {
        $this->validate([
            'modality_class_id' => 'required',
            'application_date' => 'required',
            'accreditation_code' => 'required_with:entry_date',
            'entry_date' => 'required_with:accreditation_code'
        ]);

        if( isset($this->entry_date) )
        {
            if($this->facility_details->citizenship_id == '608')
            {
                $validity = ModalityClass::where('id', $this->modality_class_id)->first()->initial_filipino_validity_years;
            }else{
                $validity = ModalityClass::where('id', $this->modality_class_id)->first()->initial_foreign_validity_years;
            }
            
            $entryDate = Carbon::parse($this->entry_date);
            $expirationDate = $entryDate->addYears($validity); 
        }
        
        Accreditation::create([
            'facility_id' =>  $this->param,
            'status_type_id' => $this->entry_date ? 1 : 3,
            'application_type_id' => 1,
            'application_sub_type_id' => 1,
            'accreditation_code' => $this->accreditation_code ? $this->accreditation_code : NULL,
            'modality_class_id' => $this->modality_class_id,
            'entry_date' => $this->entry_date,
            'application_date' => $this->application_date,
            'expiration_date' => $this->entry_date ? $expirationDate : NULL,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        Facility::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        if( isset($this->entry_date) )
        {
            $this->dispatchBrowserEvent('success-message', ['message' => 'Accreditation Added Successfully!']);
        }else{
            $this->dispatchBrowserEvent('warning-message', ['message' => 'Accreditation Saved as Draft Successfully!']);
        }
        return redirect()->back();
    }

    public function EditAccreditation(Accreditation $accreditation)
    { 
        $this->accreditation = $accreditation;
        $this->ShowUpdateModal = 2;
        $this->currentModalityID = $this->accreditation->modality_class_id;
        $this->currentApplicationSubTypeID = $this->accreditation->application_sub_type_id;
        $this->accreditation_code = $accreditation->accreditation_code;
        $this->modality_class_id = $accreditation->modality_class_id;
        $this->application_date = $accreditation->application_date;
        $this->entry_date = $accreditation->entry_date;
        $this->dispatchBrowserEvent('show-accreditation-form');
    }

    public function UpdateAccreditation()
    {
        $this->validate([
            'modality_class_id' => 'required',
            'application_date' => 'required',
            'accreditation_code' => 'required_with:entry_date',
            'entry_date' => 'required_with:accreditation_code',
        ]);

        if( isset($this->entry_date) )
        {
            if($this->facility_details->citizenship_id == '608')
            {
                if($this->currentApplicationSubTypeID == 1)
                {
                    $validity = ModalityClass::where('id', $this->modality_class_id)->first()->initial_filipino_validity_years;
                }else{
                    $validity = ModalityClass::where('id', $this->modality_class_id)->first()->renewal_filipino_validity_years;
                }   
            }else{
                if($this->currentApplicationSubTypeID == 1)
                {
                    $validity = ModalityClass::where('id', $this->modality_class_id)->first()->initial_foreign_validity_years;
                }else{
                    $validity = ModalityClass::where('id', $this->modality_class_id)->first()->renewal_foreign_validity_years;
                }  
            }
            
            if($this->currentApplicationSubTypeID == 1)
            {
                $applicationDate = Carbon::parse($this->application_date);
                $applicationYear = $applicationDate->year;
                $entryDate = Carbon::parse($this->entry_date);
                $entryDate->year = $applicationYear;
                $expirationDate = $entryDate->addYears($validity); 
            }else{
                $applicationDate = Carbon::parse($this->application_date);
                $applicationYear = $applicationDate->year;
                $renewalDate = Carbon::parse($this->entry_date);
                $renewalDate->year = $applicationYear;
                $expirationDate = $renewalDate->addYears($validity); 
            }   
        }

        $ModalityID = Accreditation::where('id', $this->accreditation->id)
              ->with('modality_class')
              ->first()
              ->modality_class
              ->modality_id;
        
        $this->accreditation->update([
            'status_type_id' => $this->entry_date ? 1 : 3,
            'accreditation_code' => $this->accreditation_code ? $this->accreditation_code : NULL,
            'modality_class_id' => $this->modality_class_id,
            'application_date' => $this->application_date,
            'entry_date' => $this->entry_date,
            'expiration_date' => $this->entry_date ? $expirationDate : NULL,
            'updated_by' => Auth::id()
        ]);  

        Accreditation::where('facility_id', $this->param)->whereHas('modality_class', function($query) use ($ModalityID) {
            $query->where('modality_id', $ModalityID);
        })->update(['entry_date' => $this->entry_date]);

        Facility::where('id', $this->param)->update(['updated_by' => Auth::id()]);

        if( isset($this->entry_date) )
        {
            $this->dispatchBrowserEvent('success-message', ['message' => 'Accreditation Updated Successfully!']);
        }else{
            $this->dispatchBrowserEvent('warning-message', ['message' => 'Accreditation Saved as Draft Successfully!']);
        }
        return redirect()->back();  
    }

    public function RenewAccreditation(Accreditation $accreditation)
    {
        $this->ShowUpdateModal = 3;
        $this->accreditation = $accreditation;
        $this->currentAccreditationID = $this->accreditation->id;
        $this->currentEntryDate = $this->accreditation->entry_date;
        $this->currentModalityID = $this->accreditation->modality_class_id;
        $this->accreditation_code = $this->accreditation->accreditation_code;
        $this->modality_class_id = $this->accreditation->modality_class_id;
        $this->application_date = Carbon::now()->format('Y-m-d');
        $this->dispatchBrowserEvent('show-accreditation-form');
    } 

    public function InsertRenewedAccreditation()
    {
        $this->validate([
            'accreditation_code' => 'required',
            'modality_class_id' => 'required',
            'application_date' => 'required'
        ]);

        if($this->facility_details->citizenship_id == '608')
        {
            $validity = ModalityClass::where('id', $this->modality_class_id)->first()->renewal_filipino_validity_years;
        }else{
            $validity = ModalityClass::where('id', $this->modality_class_id)->first()->renewal_foreign_validity_years;
        }
            
        $applicationDate = Carbon::parse($this->application_date);
        $applicationYear = $applicationDate->year;
        $renewalDate = Carbon::parse($this->entry_date);
        $renewalDate->year = $applicationYear;
        $expirationDate = $renewalDate->addYears($validity); 
 
        Accreditation::create([
            'facility_id' =>  $this->param,
            'status_type_id' => 1,
            'application_type_id' => 1,
            'application_sub_type_id' => 2,
            'accreditation_code' => $this->accreditation_code ? $this->accreditation_code : NULL,
            'modality_class_id' => $this->modality_class_id,
            'entry_date' => $this->currentEntryDate,
            'application_date' => $this->application_date,
            'expiration_date' => $expirationDate,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);

        $old_accreditation = Accreditation::find($this->currentAccreditationID);
        $old_accreditation->status_type_id = 2;
        $old_accreditation->save();
        Facility::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Accreditation Renewed Successfully!']);
        return redirect()->back();
    }

    public function render()
    {
        $existing_accreditation_modalities_class = Accreditation::where("facility_id", $this->param)->whereIn("status_type_id", [1, 3])->distinct()->pluck("modality_class_id")->toArray();
        $existing_accreditation_modalities = ModalityClass::whereIn("id", $existing_accreditation_modalities_class)->where("status_type_id", "1")->distinct()->pluck("modality_id")->toArray();
        $current_modality_class = ModalityClass::where("id", $this->currentModalityID)->pluck("modality_id")->first();
        
        return view('livewire.pages.facilities.profile-facility', [
            'facility_info' => Facility::where('id', $this->param )->first(),
            'pitahc_accreditations' => Accreditation::where('facility_id', $this->param)->whereIn("status_type_id", [1, 3])->orderBy('id', 'desc')->get(),
            'prefixes' => Prefix::all(),
            'suffixes' => Suffix::all(),
            'citizenships' => Country::all(),
            'sex_types' => SexType::all(),
            'modalities' => Modality::all(),
            'business_regions' => Region::all(),
            'business_provinces' => Province::where("region_id", $this->region_id)->orderBy('province_name', 'asc')->get(),
            'business_cities' => City::where("province_id", $this->province_id)->orderBy('city_name', 'asc')->get(),
            'business_barangays' => Barangay::where("city_id", $this->city_id)->orderBy('barangay_name', 'asc')->get(),
            //'modality_classes' => ModalityClass::whereNotIn("modality_id", $existing_accreditation_modalities)->where("status_type_id", "1")->where("modality_type_id", "2")->orderBy('modality_class_name', 'asc')->orderBy('modality_id', 'asc')->get(),
            'modality_classes' => ModalityClass::where("status_type_id", "1")->where("modality_type_id", "2")->orderBy('modality_class_name', 'asc')->orderBy('modality_id', 'asc')->get(),
            // 'renew_modality_classes' => ModalityClass::where("modality_id", $current_modality_class)->where("status_type_id", "1")->where("modality_type_id", "2")->orderBy('modality_class_name', 'asc')->orderBy('modality_id', 'asc')->get(),
            'renew_modality_classes' => ModalityClass::where("status_type_id", "1")->where("modality_type_id", "2")->orderBy('modality_class_name', 'asc')->orderBy('modality_id', 'asc')->get(),
        ]);
    }
}
