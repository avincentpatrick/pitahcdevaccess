<div>    
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Certifications</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Certifications</li>
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
                                                <input type="search" wire:model.debounce.500ms="search" class="form-control" placeholder="Search by ...." aria-label="search" aria-describedby="basic-addon1">
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
                                                        <option value="1">Active</option>
                                                        <option value="2">Expired</option>
                                                        <option value="3">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Modality</label>
                                                    <select class="form-control" wire:model="SelectedModality">
                                                        <option value="">Please Select</option>
                                                        @foreach( $modalities as $modality )
                                                        <option value="{{ $modality->id }}">{{ $modality->modality_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Modality Class</label>
                                                    <select class="form-control" wire:model="SelectedModalityClass">
                                                        <option value="">Please Select</option>
                                                        @foreach( $modality_classes as $modality_class )
                                                        <option value="{{ $modality_class->id }}">{{ $modality_class->modality_class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <select class="form-control" wire:model="SelectedSexType">
                                                        <option value="">Please Select</option>
                                                        @foreach( $sex_types as $sex_type )
                                                        <option value="{{ $sex_type->id }}">{{ $sex_type->sex_type_name }}</option>
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
                                <h3 class="card-title"><i class="fas fa-folder mr-2"></i>List of Certifications</h3>
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
                                            You have selected all <strong>{{ $certifications->total() }}</strong> items.
                                        </div>
                                        @else
                                        <div>
                                            You have selected <strong>{{ count($checked) }}</strong> items, Do you want to Select All
                                            <strong>{{ $certifications->total() }}</strong>?
                                            <a href="#" class="ml-2" wire:click="selectAll">Select All</a>
                                        </div>
                                        @endif

                                    </div>
                                    @endif
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover table-sm">
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center"><input type="checkbox" wire:model="selectPage"></th>
                                                <th style="vertical-align: middle; text-align: center">Status</th>
                                                <th style="vertical-align: middle; text-align: center">CID</th>
                                                <th style="vertical-align: middle; text-align: center">PID</th>
                                                <th style="vertical-align: middle; text-align: center">Certification Code</th>
                                                <th style="vertical-align: middle; text-align: center">Full Name <br><small><i>(last name, First name middle name)</i></small></th>
                                                <th style="vertical-align: middle; text-align: center">Sex</th>
                                                <th style="vertical-align: middle; text-align: center">Modality</th>
                                                <th style="vertical-align: middle; text-align: center">Modality Class</th>
                                                <th style="vertical-align: middle; text-align: center">Entry Date</th>
                                                <th style="vertical-align: middle; text-align: center">Expiration Date</th>
                                                <th style="vertical-align: middle; text-align: center">Updated at</th>
                                                <!-- <th style="vertical-align: middle; text-align: center">Created by</th>
                                                <th style="vertical-align: middle; text-align: center">Updated by</th> -->
                                            </tr>
                                            @foreach( $certifications as $certification )
                                            <tr class="@if ($this->isChecked($certification->cid)) table-primary @else  @endif">
                                                <td style="vertical-align: middle; text-align: center"><input type="checkbox" value="{{ $certification->cid }}" wire:model="checked"></td>
                                                @if( $certification->status_type_id==1)    
                                                <td style="vertical-align: middle; text-align: center"><span class="text-success">Active</span></td>
                                                @elseif( $certification->status_type_id==2)  
                                                <td style="vertical-align: middle; text-align: center"><span class="text-danger">Expired</span></td>
                                                @else
                                                <td style="vertical-align: middle; text-align: center"><span class="text-secondary">Inactive</span></td>
                                                @endif          
                                                <td style="vertical-align: middle; text-align: center">{{ $certification->cid }}</td>                                      
                                                <td style="vertical-align: middle; text-align: center">{{ $certification->pid }}</td>                                      
                                                <td style="vertical-align: middle; text-align: center">{{ $certification->modality_class->modality_class_code }}-{{ $certification->certification_code }}</td>                                      
                                                <td style="vertical-align: middle; text-align: center; white-space: nowrap;"><a href="{{ route('profile-practitioner', [$certification->pid]) }}">{{ $certification->last_name }}, {{ $certification->first_name }} {{ $certification->middle_name }}</a></td>
                                                <td style="vertical-align: middle; text-align: center;">{{ $certification->sex_type_id == 1 ? 'M' : 'F'  }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ $certification->modality_class->modality->modality_name }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ optional($certification->modality_class)->modality_class_name }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ Carbon\Carbon::parse($certification->entry_date)->format('F d, Y') }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ Carbon\Carbon::parse($certification->expiration_date)->format('F d, Y') }}</td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <span style="color:#1876f2;"><small>{{ $certification->updated_at->diffForHumans() }}</small></span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="d-flex justify-content-center">
                                            {{ $certifications->links() }}
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
