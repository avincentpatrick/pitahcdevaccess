<?php

namespace App\Http\Livewire\Pages;

use App\Models\Certification;
use App\Models\Accreditation;
use App\Models\ViewPractitionerDashboard;
use App\Models\ViewFacilityDashboard;
use DateTime;
use Livewire\Component;

class Dashboard extends Component
{

    public $newly_added_certificates_prev_month;
    public $newly_added_accreditations_prev_month;
    public $lastMonthYear;
    public $lastMonth;
    public $lastMonthWord;
    
    public function mount()
    {
        // Create a DateTime object for the current date
        $currentDate = new DateTime();

        // Clone the current date and subtract one month
        $lastMonthDate = clone $currentDate;
        $lastMonthDate->modify('-1 month');

        // Get the year and the numeric representation of the last month
        $this->lastMonthYear = $lastMonthDate->format('Y');
        $this->lastMonth = $lastMonthDate->format('m');
        $this->lastMonthWord = $lastMonthDate->format('F');

        $this->newly_added_certificates_prev_month = Certification::where("status_type_id", 1)->whereYear("created_at", $this->lastMonthYear)->whereMonth("created_at", $this->lastMonth)->count();
        $this->newly_added_accreditations_prev_month = Accreditation::where("status_type_id", 1)->whereYear("created_at", $this->lastMonthYear)->whereMonth("created_at", $this->lastMonth)->count();
    }
    
    public function render()
    {        
        return view('livewire.pages.dashboard', 
        [
            'certification' => ViewPractitionerDashboard::first(),
            'accreditation' => ViewFacilityDashboard::first(),
        ]);
    }
}
