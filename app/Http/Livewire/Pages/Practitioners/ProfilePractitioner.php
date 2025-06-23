<?php

namespace App\Http\Livewire\Pages\Practitioners;

use App\Models\Practitioner;
use App\Models\Prefix;
use App\Models\Suffix;
use App\Models\Response;
use App\Models\Country;
use App\Models\SexType;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use App\Models\Certification;
use App\Models\Education;
use App\Models\LicensureExamination;
use App\Models\WorkExperience;
use App\Models\Training;
use App\Models\Modality;
use App\Models\ModalityClass;
use App\Models\AvailabilityType;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Carbon\Carbon;

class ProfilePractitioner extends Component
{
    use WithFileUploads;
    public $param;
    public $ShowUpdateModal = NULL;
    public $practitioner_details;
    public $ageYears;
    public $ageMonths;
    public $ageDays;
    public $initialApplicationStatus;
    //practitioner profile
    public $practitioner = NULL;
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
    //modalities
    public $active_certification_acupuncture;
    public $active_certification_chiro;
    public $active_certification_hilot;
    public $active_certification_homeo;
    public $active_certification_naturopath;
    public $active_certification_osteopath;
    public $active_certification_tcm;
    public $active_certification_tuina;
    public $active_certification_anthro;
    public $active_certification_ayurveda;

    //certification
    public $certification_code = NULL;
    public $currentEntryDate = NULL;
    public $modality_class_id = NULL;
    public $entry_date = NULL;
    public $application_date = NULL;
    public $expiration_date = NULL;
    public $practitioner_certificate_file_name;
    public $certificate_availability_id;

    //education
    public $education = NULL;
    public $highest_educational_attainment = NULL;
    public $school_name = NULL;
    public $school_inclusive_date_from = NULL;
    public $school_inclusive_date_to = NULL;

    // licensure examination passed
    public $licensure_file_name = NULL;
    public $licensure_examination = NULL;
    public $license_file_name = NULL;
    public $nature_of_licensure_exam = NULL;
    public $date_taken = NULL;

    // work experience
    public $work_experience = NULL;
    public $work_modality_id = NULL;
    public $nature_of_practice = NULL;
    public $facility_name = NULL;
    public $work_inclusive_date_from = NULL;
    public $work_inclusive_date_to = NULL;

    //Training/ Seminars attended
    public $training = NULL;
    public $certificate_file_name = NULL;
    public $training_modality_id = NULL;
    public $title_of_training = NULL;
    public $number_of_hours = NULL;
    public $conducted_by = NULL;
    public $certificate_obtained = NULL;
    public $training_inclusive_date_from = NULL;
    public $training_inclusive_date_to = NULL;

    public $dob;
    public $certification;
    public $currentModalityID;
    public $currentCertificationID;
    public $currentApplicationSubTypeID;
    
    protected $listeners = ['fileChosen' => 'handleFileChosen'];
   

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

    public function mount($param)
    {
        $this->param = $param;
        $this->practitioner_details = Practitioner::where('id', $this->param)->first();
        $this->ageYears = $this->calculateAge($this->practitioner_details->birth_date, 'y');
        $this->ageMonths = $this->calculateAge($this->practitioner_details->birth_date, 'm');
        $this->ageDays = $this->calculateAge($this->practitioner_details->birth_date, 'd');
        $this->active_certification_acupuncture = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '1');
        })
        ->first();
        $this->active_certification_chiro = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '2');
        })
        ->first();
        $this->active_certification_hilot = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '3');
        })
        ->first();
        $this->active_certification_homeo = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '4');
        })
        ->first();
        $this->active_certification_naturopath = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '5');
        })
        ->first();
        $this->active_certification_osteopath = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '6');
        })
        ->first();
        $this->active_certification_tcm = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '7');
        })
        ->first();
        $this->active_certification_tuina = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '8');
        })
        ->first();
        $this->active_certification_anthro = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '9');
        })
        ->first();
        $this->active_certification_ayurveda = Certification::where('practitioner_id', $this->param)->where('status_type_id', 1)
        ->whereHas('modality_class', function ($query) {
            $query->where('modality_id', '10');
        })
        ->first();
    }

    public function editPractitioner(Practitioner $practitioner)
    {
        $this->practitioner = $practitioner;
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
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);     
        $this->dispatchBrowserEvent('success-message', ['message' => 'Practitioner updated successfully!']);
        return redirect()->back(); 
    }

    public function AddCertification()
    {
        $this->ShowUpdateModal = 1;
        $this->certification_code = NULL;
        $this->modality_class_id = NULL;
        $this->application_date = NULL;
        $this->entry_date = NULL;
        $this->dispatchBrowserEvent('show-certification-form');
    }
    
    public function InsertCertification()
    {
        $this->validate([
            'modality_class_id' => 'required',
            'application_date' => 'required',
            'certification_code' => 'required_with:entry_date',
            'entry_date' => 'required_with:certification_code',
            'certificate_availability_id' => 'required_with:certification_code'
        ]);

        if( isset($this->entry_date) )
        {
            if($this->practitioner_details->primary_citizenship_id == '608')
            {
                $validity = ModalityClass::where('id', $this->modality_class_id)->first()->initial_filipino_validity_years;
            }else{
                $validity = ModalityClass::where('id', $this->modality_class_id)->first()->initial_foreign_validity_years;
            }
            
            $entryDate = Carbon::parse($this->entry_date);
            $expirationDate = $entryDate->addYears($validity); 
        }
        
        Certification::create([
            'practitioner_id' =>  $this->param,
            'status_type_id' => $this->entry_date ? 1 : 3,
            'application_type_id' => 1,
            'application_sub_type_id' => 1,
            'certification_code' => $this->certification_code ? $this->certification_code : NULL,
            'certificate_availability_id' => $this->certificate_availability_id,
            'modality_class_id' => $this->modality_class_id,
            'entry_date' => $this->entry_date,
            'application_date' => $this->application_date,
            'expiration_date' => $this->entry_date ? $expirationDate : NULL,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        if( isset($this->entry_date) )
        {
            $this->dispatchBrowserEvent('success-message', ['message' => 'Certification Added Successfully!']);
        }else{
            $this->dispatchBrowserEvent('warning-message', ['message' => 'Certification Saved as Draft Successfully!']);
        }

        return redirect()->back();
    }
    
    public function EditCertification(Certification $certification)
    { 
        $this->certification = $certification;
        $this->ShowUpdateModal = 2;
        $this->currentModalityID = $this->certification->modality_class_id;
        $this->currentApplicationSubTypeID = $this->certification->application_sub_type_id;
        $this->certification_code = $certification->certification_code;
        $this->certificate_availability_id = $certification->certificate_availability_id;
        $this->modality_class_id = $certification->modality_class_id;
        $this->application_date = $certification->application_date;
        $this->entry_date = $certification->entry_date;
        $this->dispatchBrowserEvent('show-certification-form');
    }

    public function UpdateCertification()
    {
        //dd($this->practitioner_certificate_file_name);
        $this->validate([
            'modality_class_id' => 'required',
            'application_date' => 'required',
            'certification_code' => 'required_with:entry_date',
            'entry_date' => 'required_with:certification_code',
            'certificate_availability_id' => 'required_with:certification_code'
           // 'practitioner_certificate_file_name' => 'required|file|mimes:pdf|max:2048', 
        ]);

        if( isset($this->entry_date) )
        {
            if($this->practitioner_details->primary_citizenship_id == '608')
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
        // $path = $this->practitioner_certificate_file_name->store('certificates', 'public');
        $ModalityID = Certification::where('id', $this->certification->id)
              ->with('modality_class')
              ->first()
              ->modality_class
              ->modality_id;
              
        $this->certification->update([
            'status_type_id' => $this->entry_date ? 1 : 3,
            'certification_code' => $this->certification_code ? $this->certification_code : NULL,
            'certificate_availability_id' => $this->certificate_availability_id,
            'modality_class_id' => $this->modality_class_id,
            'application_date' => $this->application_date,
            'entry_date' => $this->entry_date,
            'expiration_date' => $this->entry_date ? $expirationDate : NULL,
            'updated_by' => Auth::id(),
            // 'practitioner_certificate_file_name' => $path,
        ]);  

        Certification::where('practitioner_id', $this->param)->whereHas('modality_class', function($query) use ($ModalityID) {
            $query->where('modality_id', $ModalityID);
        })->update(['entry_date' => $this->entry_date]);

        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);

        if( isset($this->entry_date) )
        {
            $this->dispatchBrowserEvent('success-message', ['message' => 'Certification Updated Successfully!']);
        }else{
            $this->dispatchBrowserEvent('warning-message', ['message' => 'Certification Saved as Draft Successfully!']);
        }
        return redirect()->back();  
    }

    public function RenewCertification(Certification $certification)
    {
        $this->ShowUpdateModal = 3;
        $this->certification = $certification;
        $this->currentCertificationID = $this->certification->id;
        $this->currentEntryDate = $this->certification->entry_date;
        $this->currentModalityID = $this->certification->modality_class_id;
        $this->certification_code = $this->certification->certification_code;
        $this->certificate_availability_id = $this->certification->certificate_availability_id;
        $this->modality_class_id = $this->certification->modality_class_id;
        $this->application_date = Carbon::now()->format('Y-m-d');
        $this->dispatchBrowserEvent('show-certification-form');
    } 

    public function InsertRenewedCertification()
    {
        $this->validate([
            'certification_code' => 'required',
            'modality_class_id' => 'required',
            'application_date' => 'required',
        ]);

        if($this->practitioner_details->primary_citizenship_id == '608')
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
 
        Certification::create([
            'practitioner_id' =>  $this->param,
            'status_type_id' => 1,
            'application_type_id' => 1,
            'application_sub_type_id' => 2,
            'certification_code' => $this->certification_code ? $this->certification_code : NULL,
            'certificate_availability_id' => $this->certificate_availability_id,
            'modality_class_id' => $this->modality_class_id,
            'entry_date' => $this->currentEntryDate,
            'application_date' => $this->application_date,
            'expiration_date' => $expirationDate,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);

        $old_certification = Certification::find($this->currentCertificationID);
        $old_certification->status_type_id = 2;
        $old_certification->save();
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Certification Renewed Successfully!']);
        return redirect()->back();
    }

    public function AddEducation()
    {
        $this->ShowUpdateModal = 1;
        $this->highest_educational_attainment = NULL;
        $this->school_name = NULL;
        $this->school_inclusive_date_from = NULL;
        $this->school_inclusive_date_to = NULL;
        $this->dispatchBrowserEvent('show-education-form');
    }

    public function InsertEducation()
    {
        $this->validate([
            'highest_educational_attainment' => 'required',
            'school_name' => 'required',
            'school_inclusive_date_from' => 'required',
            'school_inclusive_date_to' => 'required'
        ]);
        
        Education::create([
            'practitioner_id' =>  $this->param,
            'status_type_id' => 1,
            'highest_educational_attainment' => $this->highest_educational_attainment,
            'school_name' => $this->school_name,
            'school_inclusive_date_from' => $this->school_inclusive_date_from,
            'school_inclusive_date_to' => $this->school_inclusive_date_to,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Education Added Successfully!']);
        return redirect()->back();
    }
    
    public function EditEducation(Education $education)
    {
        $this->education = $education;
        $this->ShowUpdateModal = 2;
        $this->highest_educational_attainment = $education->highest_educational_attainment;
        $this->school_name = $education->school_name;
        $this->school_inclusive_date_from = $education->school_inclusive_date_from;
        $this->school_inclusive_date_to = $education->school_inclusive_date_to;
        $this->dispatchBrowserEvent('show-education-form');
    }

    public function UpdateEducation()
    {
        $this->validate([
            'highest_educational_attainment' => 'required',
            'school_name' => 'required',
            'school_inclusive_date_from' => 'required',
            'school_inclusive_date_to' => 'required'
        ]);
        $this->education->update([
            'highest_educational_attainment' => $this->highest_educational_attainment,
            'school_name' => $this->school_name,
            'school_inclusive_date_from' => $this->school_inclusive_date_from,
            'school_inclusive_date_to' => $this->school_inclusive_date_to,
            'updated_by' => Auth::id()
        ]);  
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Education Updated Successfully!']);
        return redirect()->back();  
    }

    public function AddLicensureExamPassed()
    {
        $this->ShowUpdateModal = 1;
        $this->nature_of_licensure_exam = NULL;
        $this->date_taken = NULL;
        $this->license_file_name = NULL;
        $this->dispatchBrowserEvent('show-licensure-exam-passed-form');
    }

    public function InsertLicensureExamPassed()
    {
        $this->validate([
            'nature_of_licensure_exam' => 'required',
            'date_taken' => 'required',
            'license_file_name' => 'required',
        ]);
        
        LicensureExamination::create([
            'practitioner_id' =>  $this->param,
            'status_type_id' => 1,
            'nature_of_licensure_exam' => $this->nature_of_licensure_exam,
            'date_taken' => $this->date_taken,
            'license_file_name' => $this->license_file_name,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Licensure Examination Added Successfully!']);
        return redirect()->back();
    }
    
    public function EditLicensureExamPassed(LicensureExamination $licensure_examination)
    {
        $this->licensure_examination = $licensure_examination;
        $this->ShowUpdateModal = 2;
        $this->nature_of_licensure_exam = $licensure_examination->nature_of_licensure_exam;
        $this->date_taken = $licensure_examination->date_taken;
        $this->license_file_name = $licensure_examination->license_file_name;
        $this->dispatchBrowserEvent('show-licensure-exam-passed-form');
    }

    public function UpdateLicensureExamPassed()
    {
        $this->validate([
            'nature_of_licensure_exam' => 'required',
            'date_taken' => 'required',
            'license_file_name' => 'required',
        ]);
        $this->licensure_examination->update([
            'nature_of_licensure_exam' => $this->nature_of_licensure_exam,
            'date_taken' => $this->date_taken,
            'license_file_name' => $this->license_file_name,
            'updated_by' => Auth::id()
        ]);  
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Licensure Examination Passed Updated Successfully!']);
        return redirect()->back();  
    }

    public function AddWorkExperience()
    {
        $this->ShowUpdateModal = 1;
        $this->work_modality_id = NULL;
        $this->nature_of_practice = NULL;
        $this->facility_name = NULL;
        $this->work_inclusive_date_from = NULL;
        $this->work_inclusive_date_to = NULL;
        $this->dispatchBrowserEvent('show-work-experience-form');
    }

    public function InsertWorkExperience()
    {
        $this->validate([
            'work_modality_id' => 'required',
            'nature_of_practice' => 'required',
            'facility_name' => 'required',
            'work_inclusive_date_from' => 'required',
            'work_inclusive_date_to' => 'required',
        ]);
        
        WorkExperience::create([
            'practitioner_id' =>  $this->param,
            'status_type_id' => 1,
            'work_modality_id' => $this->work_modality_id,
            'nature_of_practice' => $this->nature_of_practice,
            'facility_name' => $this->facility_name,
            'work_inclusive_date_from' => $this->work_inclusive_date_from,
            'work_inclusive_date_to' => $this->work_inclusive_date_to,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Work Experience Added Successfully!']);
        return redirect()->back();
    }
    
    public function EditWorkExperience(WorkExperience $work_experience)
    {
        $this->work_experience = $work_experience;
        $this->ShowUpdateModal = 2;
        $this->work_modality_id = $work_experience->work_modality_id;
        $this->nature_of_practice = $work_experience->nature_of_practice;
        $this->facility_name = $work_experience->facility_name;
        $this->work_inclusive_date_from = $work_experience->work_inclusive_date_from;
        $this->work_inclusive_date_to = $work_experience->work_inclusive_date_to;
        $this->dispatchBrowserEvent('show-work-experience-form');
    }

    public function UpdateWorkExperience()
    {
        $this->validate([
            'work_modality_id' => 'required',
            'nature_of_practice' => 'required',
            'facility_name' => 'required',
            'work_inclusive_date_from' => 'required',
            'work_inclusive_date_to' => 'required',
        ]);
        $this->work_experience->update([
            'work_modality_id' => $this->work_modality_id,
            'nature_of_practice' => $this->nature_of_practice,
            'facility_name' => $this->facility_name,
            'work_inclusive_date_from' => $this->work_inclusive_date_from,
            'work_inclusive_date_to' => $this->work_inclusive_date_to,
            'updated_by' => Auth::id()
        ]);  
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Work Experience Updated Successfully!']);
        return redirect()->back();  
    }

    public function AddTrainingAttended()
    {
        $this->ShowUpdateModal = 1;
        $this->training_modality_id = NULL;
        $this->title_of_training = NULL;
        $this->number_of_hours = NULL;
        $this->conducted_by = NULL;
        $this->certificate_obtained = NULL;
        $this->training_inclusive_date_from = NULL;
        $this->training_inclusive_date_to = NULL;
        $this->certificate_file_name = NULL;
        $this->dispatchBrowserEvent('show-trainings-attended-form');
    }

    public function InsertTrainingAttended()
    {
        $this->validate([
            'training_modality_id' => 'required',
            'title_of_training' => 'required',
            'number_of_hours' => 'required',
            'conducted_by' => 'required',
            'certificate_obtained' => 'required',
            'training_inclusive_date_from' => 'required',
            'training_inclusive_date_to' => 'required',
            'certificate_file_name' => 'required',
        ]);
        
        Training::create([
            'practitioner_id' =>  $this->param,
            'status_type_id' => 1,
            'training_modality_id' => $this->training_modality_id,
            'title_of_training' => $this->title_of_training,
            'number_of_hours' => $this->number_of_hours,
            'conducted_by' => $this->conducted_by,
            'certificate_obtained' => $this->certificate_obtained,
            'training_inclusive_date_from' => $this->training_inclusive_date_from,
            'training_inclusive_date_to' => $this->training_inclusive_date_to,
            'certificate_file_name' => $this->certificate_file_name,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Training Attended Added Successfully!']);
        return redirect()->back();
    }
    
    public function EditTrainingAttended(Training $training)
    {
        $this->training = $training;
        $this->ShowUpdateModal = 2;
        $this->training_modality_id = $training->training_modality_id;
        $this->title_of_training = $training->title_of_training;
        $this->number_of_hours = $training->number_of_hours;
        $this->conducted_by = $training->conducted_by;
        $this->certificate_obtained = $training->certificate_obtained;
        $this->training_inclusive_date_from = $training->training_inclusive_date_from;
        $this->training_inclusive_date_to = $training->training_inclusive_date_to;
        $this->certificate_file_name = $training->certificate_file_name;
        $this->dispatchBrowserEvent('show-trainings-attended-form');
    }

    public function UpdateTrainingAttended()
    {
        $this->validate([
            'training_modality_id' => 'required',
            'title_of_training' => 'required',
            'number_of_hours' => 'required',
            'conducted_by' => 'required',
            'certificate_obtained' => 'required',
            'training_inclusive_date_from' => 'required',
            'training_inclusive_date_to' => 'required',
            'certificate_file_name' => 'required',
        ]);
        $this->training->update([
            'training_modality_id' => $this->training_modality_id,
            'title_of_training' => $this->title_of_training,
            'number_of_hours' => $this->number_of_hours,
            'conducted_by' => $this->conducted_by,
            'certificate_obtained' => $this->certificate_obtained,
            'training_inclusive_date_from' => $this->training_inclusive_date_from,
            'training_inclusive_date_to' => $this->training_inclusive_date_to,
            'certificate_file_name' => $this->certificate_file_name,
            'updated_by' => Auth::id()
        ]);  
        Practitioner::where('id', $this->param)->update(['updated_by' => Auth::id()]);
        $this->dispatchBrowserEvent('success-message', ['message' => 'Training Attended Updated Successfully!']);
        return redirect()->back();  
    }


    public function calculateAge($dateOfBirth, $type) {
        // Convert date of birth to DateTime object
        $dob = new DateTime($dateOfBirth);
        
        // Get current date
        $currentDate = new DateTime();
        
        // Calculate the difference between the two dates
        $age = $dob->diff($currentDate);
        
        // Extract years, months, and days from the difference
        $years = $age->y;
        $months = $age->m;
        $days = $age->d;
        
        switch($type){
            case "y":
                // Code to execute if $variable is "value1"
                return $years;
                break;
            case "m":
                // Code to execute if $variable is "value2"
                return $months;
                break;
            case "d":
                // Code to execute if $variable is "value3"
                return $days;
                break;
        }
    }

    public function render()
    {
        $existing_certification_modalities_class = Certification::where("practitioner_id", $this->param)->whereIn("status_type_id", [1, 3])->distinct()->pluck("modality_class_id")->toArray();
        $existing_certification_modalities = ModalityClass::whereIn("id", $existing_certification_modalities_class)->where("status_type_id", "1")->distinct()->pluck("modality_id")->toArray();
        $current_modality_class = ModalityClass::where("id", $this->currentModalityID)->pluck("modality_id")->first();
        
        return view('livewire.pages.practitioners.profile-practitioner', 
        [
            'practitioners_info' => Practitioner::where('id', $this->param )->first(),
            'pitahc_certifications' => Certification::where('practitioner_id', $this->param)->whereIn("status_type_id", [1, 3])->orderBy('id', 'desc')->get(),
            'educations' => Education::where('practitioner_id', $this->param )->orderBy('school_inclusive_date_to', 'desc')->get(),
            'licensure_exams' => LicensureExamination::where('practitioner_id', $this->param )->get(),
            'work_experiences' => WorkExperience::where('practitioner_id', $this->param )->get(),
            'trainings' => Training::where('practitioner_id', $this->param )->get(),
            'prefixes' => Prefix::all(),
            'suffixes' => Suffix::all(),
            'responses' => Response::all(),
            'citizenships' => Country::all(),
            'sex_types' => SexType::all(),
            'residential_regions' => Region::all(),
            'modalities' => Modality::all(),
            'availability_types' => AvailabilityType::all(),
            'modality_classes' => ModalityClass::whereNotIn("modality_id", $existing_certification_modalities)->where("status_type_id", "1")->where("modality_type_id", "1")->orderBy('modality_class_name', 'asc')->orderBy('modality_id', 'asc')->get(),
            'renew_modality_classes' => ModalityClass::where("modality_id", $current_modality_class)->where("status_type_id", "1")->where("modality_type_id", "1")->orderBy('modality_class_name', 'asc')->orderBy('modality_id', 'asc')->get(),
            'residential_provinces' => Province::where("region_id", $this->residential_region_id)->orderBy('province_name', 'asc')->get(),
            'residential_cities' => City::where("province_id", $this->residential_province_id)->orderBy('city_name', 'asc')->get(),
            'residential_barangays' => Barangay::where("city_id", $this->residential_city_id)->orderBy('barangay_name', 'asc')->get(),
            'business_regions' => Region::all(),
            'business_provinces' => Province::where("region_id", $this->business_region_id)->orderBy('province_name', 'asc')->get(),
            'business_cities' => City::where("province_id", $this->business_province_id)->orderBy('city_name', 'asc')->get(),
            'business_barangays' => Barangay::where("city_id", $this->business_city_id)->orderBy('barangay_name', 'asc')->get(),
        ]);
    }
}
