<?php

namespace App\Exports;

use App\Models\Certification;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class CertificationsExport implements FromQuery, WithMapping, WithHeadings
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
            $column->practitioner_id,
            $status,
            optional($column->application_type)->application_type_name,
            optional($column->application_sub_type)->application_sub_type_name,
            optional($column->modality_class)->modality_class_code.'-'.$column->certification_code,
            optional($column->modality_class->modality)->modality_name,
            optional($column->modality_class)->modality_class_name,
            $column->entry_date,
            $column->application_date,
            $column->expiration_date,
            $column->practitioner->file_name,
            optional($column->practitioner->prefix)->prefix_name,
            $column->practitioner->last_name,
            $column->practitioner->first_name,
            $column->practitioner->middle_name,
            optional($column->practitioner->suffix)->suffix_name,
            $column->practitioner->birth_date,
            $column->practitioner->birth_place,
            $column->practitioner->citizenship_status_type_id == 1 ? 'Dual Citizenship' : NULL,
            optional($column->practitioner->primary_citizenship)->nationality_name,
            optional($column->practitioner->secondary_citizenship)->nationality_name,
            optional($column->practitioner->sex_type)->sex_type_name,
            $column->practitioner->landline,
            $column->practitioner->mobile_number,
            $column->practitioner->business_number,
            $column->practitioner->email,
            optional($column->practitioner->residential_region)->region_name,
            optional($column->practitioner->residential_province)->province_name,
            optional($column->practitioner->residential_city)->city_name,
            optional($column->practitioner->residential_barangay)->barangay_name,
            $column->practitioner->residential_address,
            optional($column->practitioner->business_region)->region_name,
            optional($column->practitioner->business_province)->province_name,
            optional($column->practitioner->business_city)->city_name,
            optional($column->practitioner->business_barangay)->barangay_name,
            $column->practitioner->business_address,
            optional($column->user_created)->last_name.', '.optional($column->user_created)->first_name,
            optional($column->user_updated)->last_name.', '.optional($column->user_updated)->first_name,
            $column->created_at,
            $column->updated_at,
        ];
    }

    public function headings(): array
    {
        return [

            'Certification ID',
            'Practitioner ID',
            'Status Type',
            'Application Type',
            'Application Sub Type',
            'Certification Code',
            'Modality',
            'Modality Class',
            'Entry Date',
            'Application Date',
            'Expiration Date',
            'File Name',
            'Prefix',
            'Last Name',
            'First Name',
            'Middle Name',
            'Suffix',
            'Birth Date',
            'Birth Place',
            'Citizenship Status Type',
            'Primary Citizenship',
            'Secondary Citizenship',
            'Sex Type',
            'Landline',
            'Mobile Number',
            'Business Nummber',
            'Email',
            'Residential Region',
            'Residential Province',
            'Residential City/Municipality',
            'Residential Barangay',
            'Residential Address',
            'Business Region',
            'Business Province',
            'Business City/Municipality',
            'Business Barangay',
            'Business Address',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At',

        ];
    }

    public function query()
    {
        return Certification::whereIn('id', $this->checked);
    }
}
