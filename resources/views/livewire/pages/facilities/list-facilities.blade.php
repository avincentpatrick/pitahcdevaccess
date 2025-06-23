<div>    
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Facilities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Facilities</li>
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
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-filter mr-2"></i>Filter</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                                </div>
                                                <input type="search" wire:model.debounce.500ms="search" class="form-control" placeholder="Search by Facility Name or Address..." aria-label="search" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="d-flex">
                                            <div>
                                                <div class="form-group">
                                                    <label style="white-space: nowrap;">Per Page</label>
                                                    <select wire:model="paginate" name="paginate" id="paginate" class="form-control">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="30">30</option>
                                                        <option value="40">40</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" wire:model="SelectedStatusType">
                                                        <option value="">Please Select</option>
                                                        @foreach( $status_types as $status_type )
                                                            <option value="{{ $status_type->id }}">{{ $status_type->status_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Region</label>
                                                    <select class="form-control" wire:model="SelectedRegion">
                                                        <option value="">Please Select</option>
                                                        @foreach( $regions as $region )
                                                            <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Province</label>
                                                    <select class="form-control" wire:model="SelectedProvince">
                                                        <option value="">Please Select</option>
                                                        @foreach( $provinces as $province )
                                                            <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>City/Municipality</label>
                                                    <select class="form-control" wire:model="SelectedCity">
                                                        <option value="">Please Select</option>
                                                        @foreach( $cities as $city )
                                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-folder mr-2"></i>List of Facilities</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    @if ($checked)
                                    <div class="d-flex justify-content-between align-content-center mb-2">   
                                        <div class="d-flex">
                                            <div>
                                                <div class="dropdown ml-4">
                                                    <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">With Checked
                                                        ({{ count($checked) }})</button>
                                                    <div class="dropdown-menu">
                                                        <!-- <a href="#" class="dropdown-item" type="button"
                                                            onclick="confirm('Are you sure you want to delete these Records?') || event.stopImmediatePropagation()"
                                                            wire:click="deleteRecords()">
                                                            Delete
                                                        </a> -->
                                                        <a href="#" class="dropdown-item" type="button"
                                                            onclick="confirm('Are you sure you want to export these Records?') || event.stopImmediatePropagation()"
                                                            wire:click="exportSelected()">
                                                            Export
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($selectPage)
                                    <div class="col-md-10 mb-2">
                                        @if ($selectAll)
                                        <div>
                                            You have selected all <strong>{{ $facilities->total() }}</strong> items.
                                        </div>
                                        @else
                                        <div>
                                            You have selected <strong>{{ count($checked) }}</strong> items, Do you want to Select All
                                            <strong>{{ $facilities->total() }}</strong>?
                                            <a href="#" class="ml-2" wire:click="selectAll">Select All</a>
                                        </div>
                                        @endif

                                    </div>
                                    @endif
                                    <div class="card-body table-responsive p-0">
                                        @if($facilities->isEmpty())
                                        <div class="text-center p-3">
                                            <p>No results found for the search.</p>
                                            <button id="add_button" type="button" class="btn btn-primary" wire:click.prevent="AddFormFacility()" data-keyboard="false"><i class="fa fa-plus mr-2"></i>Add Facility</button>
                                            <button id="clear_filter" type="button" class="btn btn-secondary ml-2" wire:click.prevent="ClearFilter()" data-keyboard="false"><i class="fas fa-redo-alt mr-2"></i>Clear Filter</button>
                                        </div>
                                        @else
                                        <table class="table table-hover table-sm">
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center"><input type="checkbox" wire:model="selectPage"></th>
                                                <th style="vertical-align: middle; text-align: center">Actions</th>
                                                <th style="vertical-align: middle; text-align: center">FID</th>
                                                <th style="vertical-align: middle; text-align: center">Status</th>
                                                <th style="vertical-align: middle; text-align: center">Facility Name</th>
                                                <th style="vertical-align: middle; text-align: center">City/Municipality</th>
                                                <th style="vertical-align: middle; text-align: center">Province</th>
                                                <th style="vertical-align: middle; text-align: center">Created by</th>
                                                <th style="vertical-align: middle; text-align: center">Updated by</th>
                                                <!-- <th style="vertical-align: middle; text-align: center">Created by</th>
                                                <th style="vertical-align: middle; text-align: center">Updated by</th> -->
                                            </tr>
                                            @foreach( $facilities as $facility )
                                            <tr class="@if ($this->isChecked($facility->id)) table-primary @else  @endif">
                                                <td style="vertical-align: middle; text-align: center"><input type="checkbox" value="{{ $facility->id }}" wire:model="checked"></td>
                                                <td style="vertical-align: middle; text-align: center">
                                                    <div style="white-space: nowrap">
                                                        @if( Auth::user()->userlevel_id == 1 )
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" wire:click.prevent="confirmDelete( {{ $facility->id }} )">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        @endif
                                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" wire:click.prevent="editFacility( {{ $facility->id }} )">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Folder" onclick="location.href='{{ route('profile-facility', [$facility->id]) }}'">
                                                            <i class="fas fa-folder"></i>
                                                        </button>
                                                    </div>  
                                                </td>
                                                <td style="vertical-align: middle; text-align: center">{{ $facility->id }}</td>
                                                @if( $facility->status_type_id==1 )    
                                                <td style="vertical-align: middle; text-align: center"><span class="text-success"><i class="fas fa-check-circle"></i></span></td>
                                                @else
                                                <td style="vertical-align: middle; text-align: center"><span class="text-danger"><i class="fas fa-times-circle"></i></span></td>
                                                @endif                                                
                                                <td style="vertical-align: middle;">{{ $facility->facility_name }}</td>
                                            
                                                <td style="vertical-align: middle; text-align: center;">{{ optional($facility->city)->city_name_lower }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ optional($facility->province)->province_name_lower }}</td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <span><small>{{ $facility->user_created->last_name }}, {{ $facility->user_created->first_name }}</small></span><br>
                                                    <span><small style="font-style: italic;">({{ $facility->user_created->email }})</small></span>
                                                    <span style="color:#1876f2;"><br><small>{{ $facility->created_at->diffForHumans() }}</small></span>
                                                </td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <span><small>{{ $facility->user_updated->last_name }}, {{ $facility->user_updated->first_name }}</small></span><br>
                                                    <span><small style="font-style: italic;">({{ $facility->user_updated->email }})</small></span>
                                                    <span style="color:#1876f2;"><br><small>{{ $facility->updated_at->diffForHumans() }}</small></span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        @endif
                                    </div>
                                    <div class="row mt-4">
                                        <div class="d-flex justify-content-center">
                                            {{ $facilities->links() }}
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
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="deleteWithPassword">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Are you sure you want to delete this record?</h5>
                    </div>
                    <div class="modal-body">
                        <p>Please enter your password to confirm deletion:</p>
                        <input type="password" wire:model="password" class="form-control" placeholder="Enter your password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
