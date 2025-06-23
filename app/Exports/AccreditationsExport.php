<?php

namespace App\Exports;

use App\Models\Accreditation;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class AccreditationsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $checked;

    public function __construct($checked)
    {
        $this->checked = $checked;
        
    }

    public function map($column): array
    {
        $currentDate = date('Y-m-d');
        if( $column->status_type_id==1 && $column->expiration_date > $currentDate)    
        {
            $status = 'Active';
        }elseif( $column->status_type_id==1 && $column->expiration_date <= $currentDate)  
        {
            $status = 'Expired';
        }else{
            $status = 'Inactive';
        }
        
        return [
            $column->id,
            $column->facility_id,
            $status,
            optional($column->application_type)->application_type_name,
            optional($column->application_sub_type)->application_sub_type_name,
            optional($column->modality_class->facility_type)->facility_type_name,
            optional($column->modality_class)->modality_class_code.'-'.$column->accreditation_code,
            optional($column->modality_class->modality)->modality_name,
            optional($column->modality_class)->modality_class_name,
            $column->entry_date,
            $column->application_date,
            $column->expiration_date,
            $column->facility->facility_name,
            optional($column->facility->prefix)->prefix_name,
            $column->facility->last_name,
            $column->facility->first_name,
            $column->facility->middle_name,
            optional($column->facility->suffix)->suffix_name,
            optional($column->facility->citizenship)->nationality_name,
            optional($column->facility->sex_type)->sex_type_name,
            $column->facility->foreign_managed_status_type_id == 1 ? 'Yes' : 'No',
            optional($column->facility->filipino_physician_prefix)->prefix_name,
            $column->facility->filipino_physician_last_name,
            $column->facility->filipino_physician_first_name,
            $column->facility->filipino_physician_middle_name,
            optional($column->facility->filipino_physician_suffix)->suffix_name,
            $column->facility->landline,
            $column->facility->mobile_number,
            $column->facility->business_number,
            $column->facility->email,
            optional($column->facility->region)->region_name,
            optional($column->facility->province)->province_name,
            optional($column->facility->city)->city_name,
            optional($column->facility->barangay)->barangay_name,
            $column->facility->address,
            optional($column->user_created)->last_name.', '.optional($column->user_created)->first_name,
            optional($column->user_updated)->last_name.', '.optional($column->user_updated)->first_name,
            $column->created_at,
            $column->updated_at,
        ];
    }

    public function headings(): array
    {
        return [

            'Accreditation ID',
            'Facility ID',
            'Status Type',
            'Application Type',
            'Application Sub Type',
            'Facility Type',
            'Accreditation Code',
            'Modality',
            'Modality Class',
            'Entry Date',
            'Application Date',
            'Expiration Date',
            'Facility Name',
            'Prefix',
            'Last Name',
            'First Name',
            'Middle Name',
            'Suffix',
            'Citizenship',
            'Sex Type',
            'Foreign Managed Status',
            'Filipino Physician Prefix',
            'Filipino Physician Last Name',
            'Filipino Physician First Name',
            'Filipino Physician Middle Name',
            'Filipino Physician Suffix',
            'Landline',
            'Mobile Number',
            'Business Nummber',
            'Email',
            'Region',
            'Province',
            'City/Municipality',
            'Barangay',
            'Address',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At',
        ];
    }

    public function query()
    {
        return Accreditation::whereIn('id', $this->checked);
    }
}
