<div>    
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Facility Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list-facilities') }}">Facilities</a></li>
                        <li class="breadcrumb-item active">Facility Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body" style="background-color: #f4f6f9;">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row text-center align-items-center">
                                                            <div class="col-md-12">
                                                                <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Profile Picture">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mt-4">
                                                                <span class="text-center align-items-center"><h5>{{ $facility_info->facility_name }}</h5></span>
                                                                <span class="float-right">
                                                                    <a wire:click.prevent="editFacility( {{ $facility_info->id }} )">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                </span>   
                                                                <table class="text-muted mt-4">
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-user mr-1"></i> Head of Office</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Last name:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"> {{ $facility_info->birth_date ? $ageYears.' year(s) '.$ageMonths.' month(s) '.$ageDays.' day(s)' : '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">First name:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $facility_info->birth_date ? Carbon\Carbon::parse($facility_info->birth_date)->format('F d, Y') : '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Middle name:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Sex:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ optional($facility_info->sex_type)->sex_type_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Citizenship:</td>
                                                                        <td>{{ optional($facility_info->primary_citizenship)->nationality_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Residential Address:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $facility_info->residential_address }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Business Address:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $facility_info->business_address }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-phone mr-1"></i> Contact Details</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Landline:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Mobile:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $facility_info->mobile_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Email Address:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"><a href="mailto:{{ $facility_info->email }}">{{ $facility_info->email }}</a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Business Number:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $facility_info->business_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-user-md mr-1"></i> Modalities</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Acupunture:</td>
                                                                        @if( $active_accreditation_acupuncture )
                                                                            @if( $active_accreditation_acupuncture->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_acupuncture->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_acupuncture->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_acupuncture->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_acupuncture->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Anthroposophic Medicine:</td>
                                                                        @if( $active_accreditation_anthro )
                                                                            @if( $active_accreditation_anthro->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_anthro->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_anthro->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_anthro->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_anthro->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Ayurveda:</td>
                                                                        @if( $active_accreditation_ayurveda )
                                                                            @if( $active_accreditation_ayurveda->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_ayurveda->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_ayurveda->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_ayurveda->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_ayurveda->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Chiropractic:</td>
                                                                        @if( $active_accreditation_chiro )
                                                                            @if( $active_accreditation_chiro->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_chiro->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_chiro->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_chiro->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_chiro->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Hilot:</td>
                                                                        @if( $active_accreditation_hilot )
                                                                            @if( $active_accreditation_hilot->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_hilot->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_hilot->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_hilot->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_hilot->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Homeopathy/ Homotoxicology:</td>
                                                                        @if( $active_accreditation_homeo )
                                                                            @if( $active_accreditation_homeo->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_homeo->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_homeo->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_homeo->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_homeo->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Naturopathy:</td>
                                                                        @if( $active_accreditation_naturopath )
                                                                            @if( $active_accreditation_naturopath->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_naturopath->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_naturopath->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_naturopath->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_naturopath->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Osteopathy:</td>
                                                                        @if( $active_accreditation_osteopath )
                                                                            @if( $active_accreditation_osteopath->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_osteopath->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_osteopath->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_osteopath->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_osteopath->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Traditional Chinese Medicine:</td>
                                                                        @if( $active_accreditation_tcm )
                                                                            @if( $active_accreditation_tcm->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_tcm->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_tcm->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_tcm->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_tcm->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Tuina Massage:</td>
                                                                        @if( $active_accreditation_tuina )
                                                                            @if( $active_accreditation_tuina->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">{{ $active_accreditation_tuina->expiration_date ? 'Valid until '.Carbon\Carbon::parse($active_accreditation_tuina->expiration_date)->subDay()->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">{{ $active_accreditation_tuina->expiration_date ? 'Expired last '.Carbon\Carbon::parse($active_accreditation_tuina->expiration_date)->format('F d, Y') : '' }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header bg-secondary">
                                                        <h3 class="card-title"><i class="fas fa-certificate mr-2"></i>PITAHC Accreditation</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="vertical-align: middle; text-align: center">Operations</th>
                                                                    <th style="vertical-align: middle; text-align: center">Status</th>
                                                                    <th style="vertical-align: middle; text-align: center">Application Sub Type</th>
                                                                    <th style="vertical-align: middle; text-align: center">Accreditation Code</th>
                                                                    <th style="vertical-align: middle; text-align: center">Modality Class</th>
                                                                    <th style="vertical-align: middle; text-align: center">Application Date</th>
                                                                    <th style="vertical-align: middle; text-align: center">Entry Date</th>
                                                                    <th style="vertical-align: middle; text-align: center">Expires on</th>
                                                                    <th style="vertical-align: middle; text-align: center">Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if( $pitahc_accreditations->count() > 0 )
                                                                @foreach($pitahc_accreditations as $pitahc_accreditation)
                                                                <tr>
                                                                    <td style="vertical-align: middle; text-align: left">
                                                                        <div style="white-space: nowrap">
                                                                            @if($pitahc_accreditation->status_type_id ==3)
                                                                            <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Renew Accreditation" disabled><i class="fas fa-redo-alt"></i></button>
                                                                            @else
                                                                            <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Renew Accreditation" wire:click.prevent="RenewAccreditation({{ $pitahc_accreditation->id }})"><i class="fas fa-redo-alt"></i></button>
                                                                            @endif
                                                                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="EditAccreditation( {{ $pitahc_accreditation->id }} )"><i class="fa fa-edit"></i></button>
                                                                        </div>  
                                                                    </td>
                                                                    @if( $pitahc_accreditation->expiration_date > Carbon\Carbon::now()->format('Y-m-d') && $pitahc_accreditation->status_type_id == 1)
                                                                    <td class="text-success" style="vertical-align: middle; text-align: center">Active</td>
                                                                    @elseif( $pitahc_accreditation->status_type_id == 2)
                                                                    <td class="text-secondary" style="vertical-align: middle; text-align: center">Inactive</td>
                                                                    @elseif( $pitahc_accreditation->expiration_date <= Carbon\Carbon::now()->format('Y-m-d') && $pitahc_accreditation->status_type_id == 1)
                                                                    <td class="text-danger" style="vertical-align: middle; text-align: center">Expired</td>
                                                                    @elseif( $pitahc_accreditation->status_type_id == 3)
                                                                    <td class="text-warning" style="vertical-align: middle; text-align: center">Pending</td>
                                                                    @endif
                                                                    <td style="vertical-align: middle; text-align: center">{{ optional($pitahc_accreditation->application_sub_type)->application_sub_type_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_accreditation->accreditation_code ? $pitahc_accreditation->modality_class->modality_class_code.'-' : '' }}{{ $pitahc_accreditation->accreditation_code }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_accreditation->modality_class->modality_class_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_accreditation->application_date ? Carbon\Carbon::parse($pitahc_accreditation->application_date)->format('F d, Y') : '' }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_accreditation->entry_date ? Carbon\Carbon::parse($pitahc_accreditation->entry_date)->format('F d, Y') : '' }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_accreditation->expiration_date ? Carbon\Carbon::parse($pitahc_accreditation->expiration_date)->format('F d, Y') : '' }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_accreditation->updated_at->diffForHumans() }}</td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td colspan="9" style="text-align:center">No record found</td>
                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-end mt-2">
                                                            <button id="add_button" type="button" class="btn btn-sm btn-primary mb-2" wire:click.prevent="AddAccreditation()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add</button>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="facility-form" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="{{ $ShowUpdateModal == 0 ? 'UpdateFacility' : 'InsertFacility' }}">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal == 0)
                                <span><i class="nav-icon fas fa-clinic-medical mr-2"></i>Update Facility</span>   
                            @else
                                <span><i class="nav-icon fas fa-clinic-medical mr-2"></i>Add Facility</span>
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="facility-information-tab" data-toggle="pill" href="#facility-information" role="tab" aria-controls="facility-information" aria-selected="true" wire:ignore>Facility Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-information-tab" data-toggle="pill" href="#contact-information" role="tab" aria-controls="contact-information" aria-selected="false" wire:ignore>Contact Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-toggle="pill" href="#address" role="tab" aria-controls="address" aria-selected="false" wire:ignore>Address</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="facility-information" role="facility_information_panel" aria-labelledby="tab" wire:ignore.self>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group" id="div_facility_name" wire:ignore.self>
                                                    <label>Facility Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input type="text" class="form-control" id="facility_name" wire:model.defer="facility_name">
                                                </div>
                                                @error('facility_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div style="display: flex; align-items: center; ">
                                                    <h6 class="mr-2">Head of Office Details</h6>
                                                    <hr style="flex-grow: 1; border: none; border-top: 1px solid #e9ecef;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group" id="div_prefix_id" wire:ignore.self>
                                                    <label>Prefix:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <select class="form-control custom-select" name="prefix_id" id="prefix_id" wire:model.defer="prefix_id">
                                                    <option value="">Please Select</option>
                                                    @foreach($prefixes as $prefix)
                                                        <option value="{{ $prefix->id }}">{{ $prefix->prefix_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('prefix_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group" id="div_last_name" wire:ignore.self>
                                                    <label>Last Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input type="text" class="form-control" id="last_name" placeholder="e.g. Dela Cruz" wire:model.defer="last_name">
                                                </div>
                                                @error('last_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_first_name" wire:ignore.self>
                                                    <label>First Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input id="first_name" type="text" class="form-control" placeholder="e.g. Juan" wire:model.defer="first_name">
                                                </div>
                                                @error('first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_middle_name" wire:ignore.self>
                                                    <label>Middle Name/Initial:</label>
                                                    <input id="middle_name" type="text" class="form-control" placeholder="e.g. G" wire:model.defer="middle_name">
                                                </div>
                                                @error('middle_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_suffix_id" wire:ignore.self>
                                                    <label>Suffix:</label>
                                                    <select class="form-control custom-select" name="suffix_id" id="suffix_id" wire:model.defer="suffix_id">
                                                    <option value="">Please Select</option>
                                                    @foreach($suffixes as $suffix)
                                                        <option value="{{ $suffix->id }}">{{ $suffix->suffix_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('suffix_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group" id="div_sex_type_id" wire:ignore.self>
                                                    <label>Sex:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <select class="form-control custom-select" name="sex_type_id" id="sex_type_id" wire:model.defer="sex_type_id">
                                                        <option value="">Please Select</option>
                                                        @foreach ($sex_types as $sex_type)
                                                            <option value="{{ $sex_type->id }}">{{ $sex_type->sex_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('sex_type_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_citizenship_id" wire:ignore.self>
                                                    <label>Citizenship:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <select class="form-control custom-select" name="citizenship_id" id="citizenship_id" wire:model.defer="citizenship_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($citizenships as $citizenship)
                                                        <option value="{{ $citizenship->id }}">{{ $citizenship->nationality_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('citizenship_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="form-check" id="div_foreign_managed_status_type_id" wire:ignore.self>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" wire:model="foreign_managed_status_type_id">
                                                        Foreign Owned Facility?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @if( $foreign_managed_status_type_id == 1 )
                                        <div class="row">
                                            <div class="col-12">
                                                <div style="display: flex; align-items: center; ">
                                                    <h6 class="mr-2">Filipino Physician Details</h6>
                                                    <hr style="flex-grow: 1; border: none; border-top: 1px solid #e9ecef;">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_filipino_physician_prefix_id" wire:ignore.self>
                                                    <label>Prefix:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <select class="form-control custom-select" name="filipino_physician_prefix_id" id="filipino_physician_prefix_id" wire:model.defer="filipino_physician_prefix_id">
                                                    <option value="">Please Select</option>
                                                    @foreach($prefixes as $prefix)
                                                        <option value="{{ $prefix->id }}">{{ $prefix->prefix_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('filipino_physician_prefix_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group" id="div_filipino_physician_last_name" wire:ignore.self>
                                                    <label>Last Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input type="text" class="form-control" id="filipino_physician_last_name" placeholder="e.g. Dela Cruz" wire:model.defer="filipino_physician_last_name">
                                                </div>
                                                @error('filipino_physician_last_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_filipino_physician_first_name" wire:ignore.self>
                                                    <label>First Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input id="filipino_physician_first_name" type="text" class="form-control" placeholder="e.g. Juan" wire:model.defer="filipino_physician_first_name">
                                                </div>
                                                @error('filipino_physician_first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_filipino_physician_middle_name" wire:ignore.self>
                                                    <label>Middle Name/Initial:</label>
                                                    <input id="filipino_physician_middle_name" type="text" class="form-control" placeholder="e.g. G" wire:model.defer="filipino_physician_middle_name">
                                                </div>
                                                @error('filipino_physician_middle_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_filipino_physician_suffix_id" wire:ignore.self>
                                                    <label>Suffix:</label>
                                                    <select class="form-control custom-select" name="filipino_physician_suffix_id" id="filipino_physician_suffix_id" wire:model.defer="filipino_physician_suffix_id">
                                                    <option value="">Please Select</option>
                                                    @foreach($suffixes as $suffix)
                                                        <option value="{{ $suffix->id }}">{{ $suffix->suffix_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('filipino_physician_suffix_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" id="div_filipino_physician_prc_id_number" wire:ignore.self>
                                                    <label>PRC ID Number:</label>
                                                    <input id="filipino_physician_prc_id_number" type="text" class="form-control" placeholder="e.g. 0012345" wire:model.defer="filipino_physician_prc_id_number">
                                                </div>
                                                @error('filipino_physician_prc_id_number')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_filipino_physician_prc_expiration_date" wire:ignore.self>
                                                    <label>Expiration Date:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input id="filipino_physician_prc_expiration_date" type="date" class="form-control" placeholder="mm/dd/yyyy" wire:model="filipino_physician_prc_expiration_date">
                                                </div>
                                                @error('filipino_physician_prc_expiration_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="contact-information" role="contact_information_panel" aria-labelledby="tab" wire:ignore.self>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group" id="div_landline" wire:ignore.self>
                                                    <label>Landline:</label>
                                                    <input type="text" class="form-control" id="landline" placeholder="e.g. (02)8123-4567" wire:model.defer="landline">
                                                </div>
                                                @error('landline')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_mobile_number" wire:ignore.self>
                                                    <label>Mobile Number:</label>
                                                    <input type="text" class="form-control" id="mobile_number" placeholder="e.g. (+63)999-123-4567" wire:model.defer="mobile_number">
                                                </div>
                                                @error('mobile_number')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_business_number" wire:ignore.self>
                                                    <label>Business Number:</label>
                                                    <input id="business_number" type="text" class="form-control" placeholder="e.g. (02)8123-4567 or (+63)999-123-4567" wire:model.defer="business_number">
                                                </div>
                                                @error('business_number')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="div_email" wire:ignore.self>
                                                    <label>Email Address:</label>
                                                    <input id="email" type="text" class="form-control" placeholder="e.g. juandelacruz@mail.com" wire:model.defer="email">
                                                </div>
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address" role="address_panel" aria-labelledby="tab" wire:ignore.self>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" id="div_address">
                                                    <label>Address:</label>
                                                    <input type="text" class="form-control" id="address" placeholder="No./Unit/Floor/Bldg/Street/Village/Subdivision/Purok/Sitio/Zone" wire:model.defer="address">
                                                </div>
                                            </div>
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="col-6">
                                                <div class="form-group" id="div_region_id" wire:ignore.self>
                                                    <label>Region:</label>
                                                    <select class="form-control custom-select" name="region_id" id="region_id" wire:model="region_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_regions as $business_region)
                                                        <option value="{{ $business_region->id }}">{{ $business_region->region_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('region_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group" id="div_province_id" wire:ignore.self>
                                                    <label>Province:</label>
                                                    <select class="form-control custom-select" name="province_id" id="province_id" wire:model="province_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_provinces as $business_province)
                                                        <option value="{{ $business_province->id }}">{{ $business_province->province_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('province_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_city_id" wire:ignore.self>
                                                    <label>City/Municipality:</label>
                                                    <select class="form-control custom-select" name="city_id" id="city_id" wire:model="city_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_cities as $business_city)
                                                        <option value="{{ $business_city->id }}">{{ $business_city->city_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('city_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_barangay_id" wire:ignore.self>
                                                    <label>Barangay:</label>
                                                    <select class="form-control custom-select" name="barangay_id" id="barangay_id" wire:model="barangay_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_barangays as $business_barangay)
                                                        <option value="{{ $business_barangay->id }}">{{ $business_barangay->barangay_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('barangay_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="mr-auto" style="font-weight: bold; font-style: italic"><span class="text-danger mr-2">*</span>Fields with red asterisk are required.</span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <span><i class="fa fa-ban mr-2"></i>Cancel</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            @if($ShowUpdateModal == 0)
                                <span><i class="fa fa-save mr-2"></i>Save</span>
                            @else  
                                <span><i class="fa fa-plus mr-2"></i>Add</span>
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="accreditation-form" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                @if($ShowUpdateModal  == 2)
                    <form autocomplete="off" wire:submit.prevent="UpdateAccreditation">
                @elseif($ShowUpdateModal  == 1)
                    <form autocomplete="off" wire:submit.prevent="InsertAccreditation">
                @else
                    <form autocomplete="off" wire:submit.prevent="InsertRenewedAccreditation">
                @endif
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal  == 2)
                                <span><i class="fas fa-certificate mr-2"></i>Edit Accreditation</span> 
                            @elseif($ShowUpdateModal  == 1)
                                <span><i class="fas fa-certificate mr-2"></i>New Accreditation</span> 
                            @else
                                <span><i class="fas fa-certificate mr-2"></i>Renew Accreditation</span> 
                            @endif
                              
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="div_accreditation_code" wire:ignore.self>
                                    <label>Accreditation Code:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="accreditation_code" type="text" class="form-control" placeholder="000-000" wire:model.defer="accreditation_code">
                                </div>
                                @error('accreditation_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_modality_class_id" wire:ignore.self>
                                    <label>Modality Class:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <select class="form-control custom-select" name="modality_class_id" id="modality_class_id" wire:model.defer="modality_class_id">
                                    <option value="">Please Select</option>
                                    @if($ShowUpdateModal == 1)
                                        @foreach($modality_classes as $modality_class)
                                            <option value="{{ $modality_class->id }}">{{ $modality_class->modality_class_name }}</option>
                                        @endforeach
                                    @else
                                        @foreach($renew_modality_classes as $renew_modality_class)
                                            <option value="{{ $renew_modality_class->id }}">{{ $renew_modality_class->modality_class_name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                @error('modality_class_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                            
                            @if($ShowUpdateModal  == 1)
                                <div class="form-group" id="main_div_application_date" wire:ignore.self>
                                    <label>Application Date:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="application_date" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="application_date">
                                </div>
                                @error('application_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror  
                                <div class="form-group" id="main_div_entry_date" wire:ignore.self>
                                    <label>Entry Date:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="entry_date" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="entry_date">
                                </div>
                                @error('entry_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror      
                            @else
                                <div class="form-group" id="main_div_application_date" wire:ignore.self>
                                    <label>Application Date:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="application_date" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="application_date">
                                </div>
                                @error('application_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror   
                                <div class="form-group" id="main_div_entry_date" wire:ignore.self>
                                    <label>Entry Date:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="entry_date" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="entry_date">
                                </div>
                                @error('entry_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror 
                            @endif      
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="mr-auto" style="font-weight: bold; font-style: italic"><span class="text-danger mr-2">*</span>Fields with red asterisk are required.</span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <span><i class="fa fa-ban mr-2"></i>Cancel</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span><i class="fa fa-save mr-2"></i>Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
