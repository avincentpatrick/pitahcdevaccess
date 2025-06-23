<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-end">
                        </div>
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
                                                <input type="search" wire:model.debounce.500ms="search" class="form-control" placeholder="Search by Name or Office..." aria-label="search" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="d-flex">
                                            <div>
                                                <div class="form-group">
                                                    <label>Per Page</label>
                                                    <select wire:model="paginate" name="paginate" id="paginate" class="form-control custom-select">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="30">30</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Userlevels</label>
                                                    <select class="custom-select" wire:model="selectedUserlevelAssigned">
                                                        <option value="">Please Select</option>
                                                        @foreach( $assigned_userlevels as $assigned_userlevel )
                                                        <option value="{{ $assigned_userlevel->id }}">{{ $assigned_userlevel->userlevel_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @if( Auth::user()->userlevel_id == 1 )
                                            <div class="ml-3">
                                                <div class="form-group">
                                                    <label>Office</label>
                                                    <select class="form-control custom-select" wire:model="selectedOffice">
                                                        <option value="">Please Select</option>
                                                        @foreach( $offices as $office )
                                                        <option value="{{ $office->id }}">{{ $office->office_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @endif
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="nav-icon fas fa-users"></i> List of Users</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    @if ($selectPage)
                                    <div class="col-md-10 mb-2">
                                        @if ($selectAll)
                                        <div>
                                            You have selected all <strong>{{ $useraccounts->total() }}</strong> items.
                                        </div>
                                        @else
                                        <div>
                                            You have selected <strong>{{ count($checked) }}</strong> items, Do you want to Select All
                                            <strong>{{ $useraccounts->total() }}</strong>?
                                            <a href="#" class="ml-2" wire:click="selectAll">Select All</a>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Email Verification Status</th>
                                                    <th>Userlevel</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Office</th>
                                                    <th>Created</th>
                                                    <th>Updated by</th>
                                                </tr>
                                                @foreach($useraccounts as $useraccount)
                                                <tr>
                                                    <td>
                                                        @if( Auth::user()->userlevel_id == 1 )
                                                            @if( $useraccount->status_id == 1 )
                                                                @if( $useraccount->email_verified_at )
                                                                <button class="btn btn-success btn-sm" style="width:100%; display:block; white-space:nowrap;" wire:click.prevent="ActivateUserForm( {{ $useraccount->id }} )"><i class="fas fa-user-check mr-2"></i>Activate</button>
                                                                @else
                                                                <button class="btn btn-success btn-sm" style="width:100%; display:block; white-space:nowrap;" disabled><i class="fas fa-user-check mr-2"></i>Activate</button>
                                                                @endif
                                                            @else
                                                                @if ( $useraccount->userlevel_id == 2 || $useraccount->userlevel_id == 3 || $useraccount->userlevel_id == 4 || $useraccount->userlevel_id == 5 || $useraccount->userlevel_id == 6 || $useraccount->userlevel_id == 7 || $useraccount->userlevel_id == 8)
                                                                    <button class="btn btn-danger btn-sm" style="width:100%; display:block; white-space:nowrap;" wire:click.prevent="DeactivateUserForm( {{ $useraccount->id }} )"><i class="fas fa-user-times mr-2"></i>Deactivate</button>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if( $useraccount->status_type_id == 1 )
                                                    <span class="text-success">Activated</span>
                                                    @elseif( $useraccount->status_type_id == 1 )
                                                    <span class="text-danger">Deactivated</span>
                                                    @else
                                                    <span class="text-warning">Pending Activation</span>
                                                    @endif
                                                    </td>
                                                    <td>
                                                    @if( $useraccount->email_verified_at )
                                                    <span class="text-success">Verified</span>
                                                    @else
                                                    <span class="text-danger">Not Verified</span>
                                                    @endif
                                                    </td>
                                                    <td>{{ optional($useraccount->userlevel)->userlevel_name }}</td>
                                                    <td>{{ $useraccount->last_name }}, {{ $useraccount->first_name }}</td>
                                                    <td>{{ $useraccount->email }}</td>
                                                    <td>{{ optional($useraccount->office)->office_name }}</td>
                                                    <td>{{ $useraccount->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <span>{{ optional($useraccount->user_updated)->name }}</span><br>
                                                        <span><small style="font-style: italic;">({{ optional($useraccount->user_updated)->email }})</small></span>
                                                        <span style="color:#1876f2; font-weight:600;"><br>{{ $useraccount->updated_at->diffForHumans() }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="d-flex justify-content-center">
                                            {{ $useraccounts->links() }}
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
    <div class="modal fade bd-example-modal-lg" id="form" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form autocomplete="off" wire:submit.prevent="{{ $showUserModal ? 'ActivateUser' : 'DeactivateUser' }}">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <span>Userlevel Activation</span>
                            @if( $email_verification_details )
                            <span class="ml-2 badge bg-success">Email Verified</span>
                            @else
                            <span class="ml-2 badge bg-danger">Email not Verified</span>
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Requested</th>
                                    <th>Assigned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight:bold">Userlevel:<span class="text-danger" style="font-weight:bold;"> *</span></td>
                                    <td></td>
                                    @if($showUserModal)
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control custom-select @error('userlevel_id') is-invalid @enderror" name="userlevel_id" id="userlevel_id" wire:model.defer="userlevel_id">
                                                <option>Select Userlevel</option>
                                                @foreach($assigned_userlevels as $userlevel)
                                                    <option value="{{ $userlevel->id }}">{{ $userlevel->userlevel_name }}</option>  
                                                @endforeach
                                            </select>
                                            @error('userlevel_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </td>
                                    @else
                                    <td style="color:green">{{ $userlevel_details }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Name:</td>
                                    <td>{{ $name_details }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Email:</td>
                                    <td>{{ $email_details }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold">Office:</td>
                                    <td>{{ $office_details }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            @if($showUserModal)
                                @if( $email_verification_details )
                                <button class="btn btn-success"><span>Activate</span></button>
                                @else
                                <button class="btn btn-success" disabled><span>Activate</span></button>
                                @endif
                            @else
                                <button class="btn btn-danger"><span>Deactivate</span></button>
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
