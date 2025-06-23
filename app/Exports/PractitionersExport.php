<?php

namespace App\Exports;

use App\Models\Practitioner;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PractitionersExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $checked;

    public function __construct($checked)
    {
        $this->checked = $checked;
    }

    public function map($column): array
    {
        return [
            $column->id,
            optional($column->status_type)->status_type_name,
            optional($column->application_type)->application_type_name,
            $column->file_name,
            optional($column->prefix)->prefix_name,
            $column->last_name,
            $column->first_name,
            $column->middle_name,
            optional($column->suffix)->suffix_name,
            $column->birth_date,
            $column->birth_place,
            $column->citizenship_status_type_id == 1 ? 'Dual Citizenship' : NULL,
            optional($column->primary_citizenship)->nationality_name,
            optional($column->secondary_citizenship)->nationality_name,
            optional($column->sex_type)->sex_type_name,
            $column->landline,
            $column->mobile_number,
            $column->business_number,
            $column->email,
            optional($column->residential_region)->region_name,
            optional($column->residential_province)->province_name,
            optional($column->residential_city)->city_name,
            optional($column->residential_barangay)->barangay_name,
            $column->residential_address,
            optional($column->business_region)->region_name,
            optional($column->business_province)->province_name,
            optional($column->business_city)->city_name,
            optional($column->business_barangay)->barangay_name,
            $column->business_address,
            optional($column->user_created)->last_name.', '.optional($column->user_created)->first_name,
            optional($column->user_updated)->last_name.', '.optional($column->user_updated)->first_name,
            $column->created_at,
            $column->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Practitioner ID',
            'Status Type',
            'Application Type',
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
        return Practitioner::whereIn('id', $this->checked);
    }
}
