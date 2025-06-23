<?php

namespace App\Exports;

use App\Models\Facility;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FacilitiesExport implements FromQuery, WithMapping, WithHeadings
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
            $column->facility_name,
            optional($column->prefix)->prefix_name,
            $column->last_name,
            $column->first_name,
            $column->middle_name,
            optional($column->suffix)->suffix_name,
            optional($column->citizenship)->nationality_name,
            optional($column->sex_type)->sex_type_name,
            $column->foreign_managed_status_type_id,
            optional($column->physician_prefix)->prefix_name,
            $column->filipino_physician_last_name,
            $column->filipino_physician_first_name,
            $column->filipino_physician_middle_name,
            optional($column->physician_suffix)->suffix_name,
            $column->landline,
            $column->mobile_number,
            $column->business_number,
            $column->email,
            optional($column->region)->region_name,
            optional($column->province)->province_name,
            optional($column->city)->city_name,
            optional($column->barangay)->barangay_name,
            $column->address,
            optional($column->user_created)->last_name.', '.optional($column->user_created)->first_name,
            optional($column->user_updated)->last_name.', '.optional($column->user_updated)->first_name,
            $column->created_at,
            $column->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Facility ID',
            'Status Type',
            'Application Type',
            'Facility Name',
            'Prefix',
            'Last Name',
            'First Name',
            'Middle Name',
            'Suffix',
            'Citizenship',
            'Sex Type',
            'Foreign Managed Facility Status',
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
        return Facility::whereIn('id', $this->checked);
    }
}
