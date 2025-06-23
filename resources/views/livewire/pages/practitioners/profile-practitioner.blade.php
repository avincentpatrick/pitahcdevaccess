<div>    
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Practitioner's Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list-practitioners') }}">Practitioners</a></li>
                        <li class="breadcrumb-item active">Practitioner's Profile</li>
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
                                                                <span class="text-center align-items-center"><h5>{{ $practitioners_info->first_name }} {{ $practitioners_info->middle_name }} {{ $practitioners_info->last_name }}</h5></span>
                                                                <span class="float-right">
                                                                    <a wire:click.prevent="editPractitioner( {{ $practitioners_info->id }} )">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                </span>   
                                                                <table class="text-muted mt-4">
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-user mr-1"></i> Personal Information</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Age:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"> {{ $practitioners_info->birth_date ? $ageYears.' year(s) '.$ageMonths.' month(s) '.$ageDays.' day(s)' : '' }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Date of Birth:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $practitioners_info->birth_date ? Carbon\Carbon::parse($practitioners_info->birth_date)->format('F d, Y') : '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Place of Birth:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Sex:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $practitioners_info->sex_type->sex_type_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Citizenship:</td>
                                                                        <td>{{ optional($practitioners_info->primary_citizenship)->nationality_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Residential Address:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $practitioners_info->residential_address }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Business Address:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $practitioners_info->business_address }}</td>
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
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $practitioners_info->mobile_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Email Address:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"><a href="mailto:{{ $practitioners_info->email }}">{{ $practitioners_info->email }}</a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Business Number:</td>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">{{ $practitioners_info->business_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan='2'>
                                                                            <hr>
                                                                            <strong><i class="fas fa-user-md mr-1"></i> Modalities</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Acupunture:</td>
                                                                        @if( $active_certification_acupuncture )
                                                                            @if( $active_certification_acupuncture->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_acupuncture->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_acupuncture->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Anthroposophic Medicine:</td>
                                                                        @if( $active_certification_anthro )
                                                                            @if( $active_certification_anthro->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_anthro->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_anthro->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Ayurveda:</td>
                                                                        @if( $active_certification_ayurveda )
                                                                            @if( $active_certification_ayurveda->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_ayurveda->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_ayurveda->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Chiropractic:</td>
                                                                        @if( $active_certification_chiro )
                                                                            @if( $active_certification_chiro->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_chiro->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_chiro->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Hilot:</td>
                                                                        @if( $active_certification_hilot )
                                                                            @if( $active_certification_hilot->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_hilot->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_hilot->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Homeopathy/ Homotoxicology:</td>
                                                                        @if( $active_certification_homeo )
                                                                            @if( $active_certification_homeo->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_homeo->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_homeo->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Naturopathy:</td>
                                                                        @if( $active_certification_naturopath )
                                                                            @if( $active_certification_naturopath->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_naturopath->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_naturopath->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Osteopathy:</td>
                                                                        @if( $active_certification_osteopath )
                                                                            @if( $active_certification_osteopath->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_osteopath->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_osteopath->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Traditional Chinese Medicine:</td>
                                                                        @if( $active_certification_tcm )
                                                                            @if( $active_certification_tcm->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_tcm->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_tcm->expiration_date)->format('F d, Y') }}</i></small></span></td>
                                                                            @endif
                                                                        @else
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;"></td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:50%; text-wrap: wrap; vertical-align: top;">Tuina Massage:</td>
                                                                        @if( $active_certification_tuina )
                                                                            @if( $active_certification_tuina->expiration_date > Carbon\Carbon::now()->format('Y-m-d') )
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-success"><small><i class="ml-2">Valid until {{ Carbon\Carbon::parse($active_certification_tuina->expiration_date)->subDay()->format('F d, Y') }}</i></small></span></td>
                                                                            @else
                                                                            <td style="width:50%; text-wrap: wrap; vertical-align: top;"><span class="text-danger"><small><i class="ml-2">Expired last {{ Carbon\Carbon::parse($active_certification_tuina->expiration_date)->format('F d, Y') }}</i></small></span></td>
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
                                                        <h3 class="card-title"><i class="fas fa-certificate mr-2"></i>PITAHC Certification</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="vertical-align: middle; text-align: center">ID</th>
                                                                    <th style="vertical-align: middle; text-align: center">Operations</th>
                                                                    <th style="vertical-align: middle; text-align: center">Status</th>
                                                                    <th style="vertical-align: middle; text-align: center">Application Sub Type</th>
                                                                    <th style="vertical-align: middle; text-align: center">Certification Code</th>
                                                                    <th style="vertical-align: middle; text-align: center">Modality Class</th>
                                                                    <th style="vertical-align: middle; text-align: center">Application Date</th>
                                                                    <th style="vertical-align: middle; text-align: center">Entry Date</th>
                                                                    <th style="vertical-align: middle; text-align: center">Expires on</th>
                                                                    <th style="vertical-align: middle; text-align: center">Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if( $pitahc_certifications->count() > 0 )
                                                                @foreach($pitahc_certifications as $pitahc_certification)
                                                                <tr>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->id }}</td>
                                                                    <td style="vertical-align: middle; text-align: left">
                                                                        <div style="white-space: nowrap">
                                                                            @if($pitahc_certification->status_type_id ==3)
                                                                            <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Renew Certification" disabled><i class="fas fa-redo-alt"></i></button>
                                                                            @else
                                                                            <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Renew Certification" wire:click.prevent="RenewCertification({{ $pitahc_certification->id }})"><i class="fas fa-redo-alt"></i></button>
                                                                            @endif
                                                                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="EditCertification( {{ $pitahc_certification->id }} )"><i class="fa fa-edit"></i></button>
                                                                            @if($pitahc_certification->certificate_availability_id == 1)
                                                                            <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Certificate" onclick="window.location.href='{{ route('view-certificate', ['param' => $pitahc_certification->id]) }}'"><i class="fas fa-certificate"></i></button>
                                                                            @else
                                                                            <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Certificate" disabled><i class="fas fa-certificate"></i></button>
                                                                            @endif
                                                                        </div>  
                                                                    </td>
                                                                    @if( $pitahc_certification->expiration_date > Carbon\Carbon::now()->format('Y-m-d') && $pitahc_certification->status_type_id == 1)
                                                                    <td class="text-success" style="vertical-align: middle; text-align: center">Active</td>
                                                                    @elseif( $pitahc_certification->status_type_id == 2)
                                                                    <td class="text-secondary" style="vertical-align: middle; text-align: center">Inactive</td>
                                                                    @elseif( $pitahc_certification->expiration_date <= Carbon\Carbon::now()->format('Y-m-d') && $pitahc_certification->status_type_id == 1)
                                                                    <td class="text-danger" style="vertical-align: middle; text-align: center">Expired</td>
                                                                    @elseif( $pitahc_certification->status_type_id == 3)
                                                                    <td class="text-warning" style="vertical-align: middle; text-align: center">Pending</td>
                                                                    @endif
                                                                    <td style="vertical-align: middle; text-align: center">{{ optional($pitahc_certification->application_sub_type)->application_sub_type_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->certification_code ? $pitahc_certification->modality_class->modality_class_code.'-' : '' }}{{ $pitahc_certification->certification_code }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->modality_class->modality_class_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->application_date ? Carbon\Carbon::parse($pitahc_certification->application_date)->format('F d, Y') : '' }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->entry_date ? Carbon\Carbon::parse($pitahc_certification->entry_date)->format('F d, Y') : '' }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->expiration_date ? Carbon\Carbon::parse($pitahc_certification->expiration_date)->format('F d, Y') : '' }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $pitahc_certification->updated_at->diffForHumans() }}</td>
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
                                                            <button id="add_button" type="button" class="btn btn-sm btn-primary mb-2" wire:click.prevent="AddCertification()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add</button>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header bg-secondary">
                                                        <h3 class="card-title"><i class="fas fa-university mr-2"></i>Educational Background <small><i>(Note: Indicate only college level up to postgraduate, if applicable)</i></small></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="vertical-align: middle; text-align: center">Operations</th>
                                                                    <th style="vertical-align: middle; text-align: center">Highest Educational Attainment</th>
                                                                    <th style="vertical-align: middle; text-align: center">Name of Institution/School</th>
                                                                    <th style="vertical-align: middle; text-align: center">Inclusive of Completion Date</th>
                                                                    <th style="vertical-align: middle; text-align: center">Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if( $educations->count() > 0 )
                                                                @foreach($educations as $education)
                                                                <tr>
                                                                    <td style="vertical-align: middle; text-align: left">
                                                                        <div style="white-space: nowrap">
                                                                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="EditEducation({{ $education->id }})">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>
                                                                        </div>  
                                                                    </td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $education->highest_educational_attainment }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $education->school_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ Carbon\Carbon::parse($education->school_inclusive_date_from)->format('F d, Y') }} to {{ Carbon\Carbon::parse($education->school_inclusive_date_to)->format('F d, Y') }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $education->updated_at->diffForHumans() }}</td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td colspan="6" style="text-align:center">No record found</td>
                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-end mt-2">
                                                            <button id="add_button" type="button" class="btn btn-sm btn-primary mb-2" wire:click.prevent="AddEducation()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add</button>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header bg-secondary">
                                                        <h3 class="card-title"><i class="fas fa-id-badge mr-2"></i>Licensure Examination Passed</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="vertical-align: middle; text-align: center">Operations</th>
                                                                    <th style="vertical-align: middle; text-align: center">Nature of Licensure Examination</th>
                                                                    <th style="vertical-align: middle; text-align: center">Date Taken</th>
                                                                    <th style="vertical-align: middle; text-align: center">Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if( $licensure_exams->count() > 0 )
                                                                @foreach($licensure_exams as $licensure_exam)
                                                                <tr>
                                                                    <td style="vertical-align: middle; text-align: left">
                                                                        <div style="white-space: nowrap">
                                                                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="EditLicensureExamPassed({{ $licensure_exam->id }})">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>
                                                                        </div>  
                                                                    </td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $licensure_exam->nature_of_licensure_exam }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ Carbon\Carbon::parse($licensure_exam->date_taken)->format('F d, Y') }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $licensure_exam->updated_at->diffForHumans() }}</td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td colspan="5" style="text-align:center">No record found</td>
                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-end mt-2">
                                                            <button id="add_button" type="button" class="btn btn-sm btn-primary mb-2" wire:click.prevent="AddLicensureExamPassed()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add</button>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header bg-secondary">
                                                        <h3 class="card-title"><i class="fas fa-briefcase mr-2"></i>Work Experience <small><i>(Note: Start with the most recent TAHC modality practice)</i></small></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="vertical-align: middle; text-align: center">Operations</th>
                                                                    <th style="vertical-align: middle; text-align: center">Modality</th>
                                                                    <th style="vertical-align: middle; text-align: center">Nature of Practice</th>
                                                                    <th style="vertical-align: middle; text-align: center">Clinic/Company/Office</th>
                                                                    <th style="vertical-align: middle; text-align: center">InclusiveDates</th>
                                                                    <th style="vertical-align: middle; text-align: center">Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if( $work_experiences->count() > 0 )
                                                                @foreach($work_experiences as $work_experience)
                                                                <tr>
                                                                    <td style="vertical-align: middle; text-align: left">
                                                                        <div style="white-space: nowrap">
                                                                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="EditWorkExperience({{ $work_experience->id }})">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>
                                                                        </div>  
                                                                    </td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $work_experience->modality->modality_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $work_experience->nature_of_practice }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $work_experience->facility_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ Carbon\Carbon::parse($work_experience->work_inclusive_date_from)->format('F d, Y') }} to {{ Carbon\Carbon::parse($work_experience->work_inclusive_date_to)->format('F d, Y') }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $work_experience->updated_at->diffForHumans() }}</td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td colspan="7" style="text-align:center">No record found</td>
                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-end mt-2">
                                                            <button id="add_button" type="button" class="btn btn-sm btn-primary mb-2" wire:click.prevent="AddWorkExperience()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add</button>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header bg-secondary">
                                                        <h3 class="card-title"><i class="fas fa-chalkboard-teacher mr-2"></i>Trainings/Seminars attended <small><i>(Note: Indicate only those trainings related to TAHC modalities. Please attach certificates obtained)</i></small></h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="vertical-align: middle; text-align: center">Operations</th>
                                                                    <th style="vertical-align: middle; text-align: center">Modality</th>
                                                                    <th style="vertical-align: middle; text-align: center">Title of Training</th>
                                                                    <th style="vertical-align: middle; text-align: center">No. of Hours</th>
                                                                    <th style="vertical-align: middle; text-align: center">Conducted by</th>
                                                                    <th style="vertical-align: middle; text-align: center">Certificate Obtained</th>
                                                                    <th style="vertical-align: middle; text-align: center">Inclusive Dates</th>
                                                                    <th style="vertical-align: middle; text-align: center">Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if( $trainings->count() > 0 )
                                                                @foreach($trainings as $training)
                                                                <tr>
                                                                    <td style="vertical-align: middle; text-align: left">
                                                                        <div style="white-space: nowrap">
                                                                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="EditTrainingAttended({{ $training->id }})">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>
                                                                        </div>  
                                                                    </td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $training->modality->modality_name }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $training->title_of_training }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $training->number_of_hours }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $training->conducted_by }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $training->certificate_obtained }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ Carbon\Carbon::parse($training->training_inclusive_date_from)->format('F d, Y') }} to {{ Carbon\Carbon::parse($training->training_inclusive_date_to)->format('F d, Y') }}</td>
                                                                    <td style="vertical-align: middle; text-align: center">{{ $training->updated_at->diffForHumans() }}</td>
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
                                                            <button id="add_button" type="button" class="btn btn-sm btn-primary mb-2" wire:click.prevent="AddTrainingAttended()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add</button>
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
    <div class="modal fade bd-example-modal-lg" id="practitioner-form" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="UpdatePractitioner">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <span><i class="nav-icon fas fa-user-md mr-2"></i>Update Practitioner</span>   
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="personal-information-tab" data-toggle="pill" href="#personal-information" role="tab" aria-controls="personal-information" aria-selected="true" wire:ignore>Personal Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-information-tab" data-toggle="pill" href="#contact-information" role="tab" aria-controls="contact-information" aria-selected="false" wire:ignore>Contact Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="residential-address-tab" data-toggle="pill" href="#residential-address" role="tab" aria-controls="residential-address" aria-selected="false" wire:ignore>Residential Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="business-address-tab" data-toggle="pill" href="#business-address" role="tab" aria-controls="business-address" aria-selected="false" wire:ignore>Business Address</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="personal-information" role="personal_information_panel" aria-labelledby="tab" wire:ignore.self>
                                <div class="row">
                                    <div class="col-md-12">
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
                                            <div class="col-4">
                                                <div class="form-group" id="div_last_name" wire:ignore.self>
                                                    <label>Last Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input type="text" class="form-control" id="last_name" placeholder="e.g. Dela Cruz" wire:model.defer="last_name">
                                                </div>
                                                @error('last_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_first_name" wire:ignore.self>
                                                    <label>First Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input id="first_name" type="text" class="form-control" placeholder="e.g. Juan" wire:model.defer="first_name">
                                                </div>
                                                @error('first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_middle_name" wire:ignore.self>
                                                    <label>Middle Name/Initial:</label>
                                                    <input id="middle_name" type="text" class="form-control" placeholder="e.g. G" wire:model.defer="middle_name">
                                                </div>
                                                @error('middle_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" id="div_birth_place" wire:ignore.self>
                                                    <label>Place of Birth:</label>
                                                    <input id="birth_place" type="text" class="form-control" placeholder="e.g. Manila" wire:model.defer="birth_place">
                                                </div>
                                                @error('birth_place')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group" id="main_div_birth_date" wire:ignore.self>
                                                    <label>Date of Birth:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <input id="birth_date" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="birth_date">
                                                </div>
                                                @error('birth_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
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
                                        </div>  
                                        <div class="row">
                                            <div class="col-12"><label>Citizenship:</label></div>
                                            <div class="col-12">
                                                <div class="form-check" id="div_citizenship_status_type_id" wire:ignore.self>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" wire:model="citizenship_status_type_id">
                                                        Dual Citizen?
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12"><br></div>
                                            <div class="col-6">
                                                <div class="form-group" id="div_primary_citizenship_id" wire:ignore.self>
                                                    <label>Primary Citizenship:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <select class="form-control custom-select" name="primary_citizenship_id" id="primary_citizenship_id" wire:model.defer="primary_citizenship_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($citizenships as $citizenship)
                                                        <option value="{{ $citizenship->id }}">{{ $citizenship->nationality_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('primary_citizenship_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            @if( $citizenship_status_type_id == 1 )
                                            <div class="col-6">
                                                <div class="form-group" id="div_secondary_citizenship_id" wire:ignore.self>
                                                    <label>Secondary Citizenship:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                                    <select class="form-control custom-select" name="secondary_citizenship_id" id="secondary_citizenship_id" wire:model.defer="secondary_citizenship_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($citizenships as $citizenship)
                                                        <option value="{{ $citizenship->id }}">{{ $citizenship->nationality_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('secondary_citizenship_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
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
                            <div class="tab-pane" id="residential-address" role="residential_address_panel" aria-labelledby="tab" wire:ignore.self>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" id="div_residential_address">
                                                    <label>Residential Address:</label>
                                                    <input type="text" class="form-control" id="residential_address" placeholder="No./Unit/Floor/Bldg/Street/Village/Subdivision/Purok/Sitio/Zone" wire:model.defer="residential_address">
                                                </div>
                                            </div>
                                            @error('residential_address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="col-6">
                                                <div class="form-group" id="div_residential_region_id" wire:ignore.self>
                                                    <label>Region:</label>
                                                    <select class="form-control custom-select" name="residential_region_id" id="residential_region_id" wire:model="residential_region_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($residential_regions as $residential_region)
                                                        <option value="{{ $residential_region->id }}">{{ $residential_region->region_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('residential_region_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group" id="div_residential_province_id" wire:ignore.self>
                                                    <label>Province:</label>
                                                    <select class="form-control custom-select" name="residential_province_id" id="residential_province_id" wire:model="residential_province_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($residential_provinces as $residential_province)
                                                        <option value="{{ $residential_province->id }}">{{ $residential_province->province_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('residential_province_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_residential_city_id" wire:ignore.self>
                                                    <label>City/Municipality:</label>
                                                    <select class="form-control custom-select" name="residential_city_id" id="residential_city_id" wire:model="residential_city_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($residential_cities as $residential_city)
                                                        <option value="{{ $residential_city->id }}">{{ $residential_city->city_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('residential_city_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_residential_barangay_id" wire:ignore.self>
                                                    <label>Barangay:</label>
                                                    <select class="form-control custom-select" name="residential_barangay_id" id="residential_barangay_id" wire:model="residential_barangay_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($residential_barangays as $residential_barangay)
                                                        <option value="{{ $residential_barangay->id }}">{{ $residential_barangay->barangay_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('residential_barangay_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="business-address" role="business_address_panel" aria-labelledby="tab" wire:ignore.self>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" id="div_business_address">
                                                    <label>Business Address:</label>
                                                    <input type="text" class="form-control" id="business_address" placeholder="No./Unit/Floor/Bldg/Street/Village/Subdivision/Purok/Sitio/Zone" wire:model.defer="residential_address">
                                                </div>
                                            </div>
                                            @error('business_address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="col-6">
                                                <div class="form-group" id="div_business_region_id" wire:ignore.self>
                                                    <label>Region:</label>
                                                    <select class="form-control custom-select" name="business_region_id" id="business_region_id" wire:model="business_region_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_regions as $business_region)
                                                        <option value="{{ $business_region->id }}">{{ $business_region->region_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('business_region_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group" id="div_business_province_id" wire:ignore.self>
                                                    <label>Province:</label>
                                                    <select class="form-control custom-select" name="business_province_id" id="business_province_id" wire:model="business_province_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_provinces as $business_province)
                                                        <option value="{{ $business_province->id }}">{{ $business_province->province_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('business_province_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_business_city_id" wire:ignore.self>
                                                    <label>City/Municipality:</label>
                                                    <select class="form-control custom-select" name="business_city_id" id="business_city_id" wire:model="business_city_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_cities as $business_city)
                                                        <option value="{{ $business_city->id }}">{{ $business_city->city_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('business_city_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group" id="div_business_barangay_id" wire:ignore.self>
                                                    <label>Barangay:</label>
                                                    <select class="form-control custom-select" name="business_barangay_id" id="business_barangay_id" wire:model="business_barangay_id">
                                                    <option value="">Please Select</option>
                                                    @foreach ($business_barangays as $business_barangay)
                                                        <option value="{{ $business_barangay->id }}">{{ $business_barangay->barangay_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                @error('business_barangay_id')
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
                            <span><i class="fa fa-save mr-2"></i>Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="certification-form" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                @if($ShowUpdateModal  == 2)
                    <form autocomplete="off" wire:submit.prevent="UpdateCertification">
                @elseif($ShowUpdateModal  == 1)
                    <form autocomplete="off" wire:submit.prevent="InsertCertification">
                @else
                    <form autocomplete="off" wire:submit.prevent="InsertRenewedCertification">
                @endif
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal  == 2)
                                <span><i class="fas fa-certificate mr-2"></i>Edit Certification</span> 
                            @elseif($ShowUpdateModal  == 1)
                                <span><i class="fas fa-certificate mr-2"></i>New Certification</span> 
                            @else
                                <span><i class="fas fa-certificate mr-2"></i>Renew Certification</span> 
                            @endif
                              
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="div_certification_code" wire:ignore.self>
                                    <label>Certification Code:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="certification_code" type="text" class="form-control" placeholder="000-000" wire:model.defer="certification_code">
                                </div>
                                @error('certification_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_certificate_availability_id" wire:ignore.self>
                                    <label>Certificate Availability:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <select class="form-control custom-select" name="certificate_availability_id" id="certificate_availability_id" wire:model.defer="certificate_availability_id">
                                        <option value="">Please Select</option>
                                            @foreach ($availability_types as $availability_type)
                                                <option value="{{ $availability_type->id }}">{{ $availability_type->availability_type_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                @error('certificate_availability_id')
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
                                @if($ShowUpdateModal  == 2)
                                    <div class="form-group">
                                        {{ $practitioner_certificate_file_name }}
                                        <label>Upload Certificate:</label><br>
                                        <div class="custom-file">
                                            <input type="file" wire:model="practitioner_certificate_file_name">
                                        </div>
                                    </div>
                                    
                                    @if($practitioner_certificate_file_name)
                                        <p>Uploaded File: {{ $practitioner_certificate_file_name  }}</p>
                                    @endif
                                    
                                    @error('practitioner_certificate_file_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                @endif
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
    <div class="modal fade bd-example-modal-lg" id="education-form" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="{{ $ShowUpdateModal == 2 ? 'UpdateEducation' : 'InsertEducation' }}">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal  == 2)
                                <span><i class="fas fa-university mr-2"></i>Edit Education</span> 
                            @else
                                <span><i class="fas fa-university mr-2"></i>Add Education</span> 
                            @endif 
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="div_highest_educational_attainment" wire:ignore.self>
                                    <label>Highest Educational Attainment:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="highest_educational_attainment" type="text" class="form-control" placeholder="" wire:model.defer="highest_educational_attainment">
                                </div>
                                @error('highest_educational_attainment')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_school_name" wire:ignore.self>
                                    <label>Name of Institution/School:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="school_name" type="text" class="form-control" placeholder="" wire:model.defer="school_name">
                                </div>
                                @error('school_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_school_inclusive_date_from" wire:ignore.self>
                                    <label>Inclusive Date From:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="school_inclusive_date_from" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="school_inclusive_date_from">
                                </div>
                                @error('school_inclusive_date_from')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_school_inclusive_date_to" wire:ignore.self>
                                    <label>Inclusive Date To:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="school_inclusive_date_to" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="school_inclusive_date_to">
                                </div>
                                @error('school_inclusive_date_to')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
    <div class="modal fade bd-example-modal-lg" id="licensure-exam-passed-form" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="{{ $ShowUpdateModal == 2 ? 'UpdateLicensureExamPassed' : 'InsertLicensureExamPassed' }}">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal  == 2)
                                <span><i class="fas fa-id-badge mr-2"></i>Edit Licensure Examination Passed</span> 
                            @else
                                <span><i class="fas fa-id-badge mr-2"></i>Add Licensure Examination Passed</span> 
                            @endif   
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="div_nature_of_licensure_exam" wire:ignore.self>
                                    <label>Nature of Licensure Examination:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="nature_of_licensure_exam" type="text" class="form-control" placeholder="" wire:model.defer="nature_of_licensure_exam">
                                </div>
                                @error('nature_of_licensure_exam')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_date_taken" wire:ignore.self>
                                    <label>Date Taken:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="date_taken" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="date_taken">
                                </div>
                                @error('date_taken')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
    <div class="modal fade bd-example-modal-lg" id="work-experience-form" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="{{ $ShowUpdateModal == 2 ? 'UpdateWorkExperience' : 'InsertWorkExperience' }}">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal  == 2)
                                <span><i class="fas fa-briefcase mr-2"></i>Edit Work Experience</span> 
                            @else
                                <span><i class="fas fa-briefcase mr-2"></i>Add Work Experience</span> 
                            @endif     
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="div_work_modality_id" wire:ignore.self>
                                    <label>Modality:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <select class="form-control custom-select" name="work_modality_id" id="work_modality_id" wire:model.defer="work_modality_id">
                                    <option value="">Please Select</option>
                                    @foreach($modalities as $modality)
                                        <option value="{{ $modality->id }}">{{ $modality->modality_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('work_modality_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_nature_of_practice" wire:ignore.self>
                                    <label>Nature of Practice:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="nature_of_practice" type="text" class="form-control" placeholder="" wire:model.defer="nature_of_practice">
                                </div>
                                @error('nature_of_practice')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_facility_name" wire:ignore.self>
                                    <label>Facility Name:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="facility_name" type="text" class="form-control" placeholder="" wire:model.defer="facility_name">
                                </div>
                                @error('facility_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_work_inclusive_date_from" wire:ignore.self>
                                    <label>Inclusive Date From:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="work_inclusive_date_from" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="work_inclusive_date_from">
                                </div>
                                @error('work_inclusive_date_from')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_work_inclusive_date_to" wire:ignore.self>
                                    <label>Inclusive Date To:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="work_inclusive_date_to" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="work_inclusive_date_to">
                                </div>
                                @error('work_inclusive_date_to')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
    <div class="modal fade bd-example-modal-lg" id="trainings-attended-form" wire:ignore.self>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="{{ $ShowUpdateModal == 2 ? 'UpdateTrainingAttended' : 'InsertTrainingAttended' }}">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($ShowUpdateModal  == 2)
                                <span><i class="fas fa-chalkboard-teacher mr-2"></i>Edit Training/ Seminar Attended</span> 
                            @else
                                <span><i class="fas fa-chalkboard-teacher mr-2"></i>Add Training/ Seminar Attended</span> 
                            @endif     
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="div_training_modality_id" wire:ignore.self>
                                    <label>Modality:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <select class="form-control custom-select" name="training_modality_id" id="training_modality_id" wire:model.defer="training_modality_id">
                                    <option value="">Please Select</option>
                                    @foreach($modalities as $modality)
                                        <option value="{{ $modality->id }}">{{ $modality->modality_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('training_modality_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_title_of_training" wire:ignore.self>
                                    <label>Title of Training:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="title_of_training" type="text" class="form-control" placeholder="" wire:model.defer="title_of_training">
                                </div>
                                @error('title_of_training')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_number_of_hours" wire:ignore.self>
                                    <label>Number of Hours:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="number_of_hours" type="number" class="form-control" placeholder="" wire:model.defer="number_of_hours">
                                </div>
                                @error('number_of_hours')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_conducted_by" wire:ignore.self>
                                    <label>Conducted by:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="conducted_by" type="text" class="form-control" placeholder="" wire:model.defer="conducted_by">
                                </div>
                                @error('conducted_by')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="div_certificate_obtained" wire:ignore.self>
                                    <label>Certificate Obtained:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="certificate_obtained" type="text" class="form-control" placeholder="" wire:model.defer="certificate_obtained">
                                </div>
                                @error('certificate_obtained')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_training_inclusive_date_from" wire:ignore.self>
                                    <label>Inclusive Date From:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="training_inclusive_date_from" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="training_inclusive_date_from">
                                </div>
                                @error('training_inclusive_date_from')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="main_div_training_inclusive_date_to" wire:ignore.self>
                                    <label>Inclusive Date To:</label><span class="text-danger" style="font-weight:bold;"> *</span>
                                    <input id="training_inclusive_date_to" type="date" class="form-control" placeholder="mm/dd/yyyy" max="{{ date('Y-m-d') }}" wire:model="training_inclusive_date_to">
                                </div>
                                @error('training_inclusive_date_to')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
