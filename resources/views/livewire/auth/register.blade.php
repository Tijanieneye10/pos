<div>
    <div class="box">
        <div class="box-header">
            <h2>Manage Staff</h2>
            <small>Manage Staff here</small>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Add Staff</button>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="datatable" class="table v-middle p-0 m-0 box" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Fullname</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->role}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->phone}}</td>
                            <td>
                                <i class="fa fa-times text-danger d-inline" style="cursor: pointer" onclick="confirm('Do you want to delete staff')" wire:click.prevent="destroyStaff({{ $user->id }})"></i>
                                <i class="fa fa-edit text-primary d-inline" style="cursor: pointer" wire:click.prevent="editStaff({{ $user->id }})"
                                    data-toggle="modal" data-target="#exampleModal"
                                    data-whatever="@mdo"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Staff Dialog box</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="resetFilters">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                            <h2>Manage Staff</h2>
                            <small>Manage Staff here</small>
                            <div class="box-body">

                                <form wire:submit.prevent="@if($edit) updateStaff({{ $editData->id }}) @else  addStaff  @endif    ">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inpuFirstname4">Firstname</label>
                                            <input type="text" class="form-control" id="inpuFirstname4"
                                                placeholder="Firstname" value="{{$edit ? $editData->firstname : '' }}" wire:model="firstname">
                                            @error('firstname') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastname4">Lastname</label>
                                            <input type="text" class="form-control" id="inputLastname4"
                                                placeholder="Lastname" value="{{$edit ? $editData->lastname  : '' }}" wire:model="lastname">
                                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <div class="col-md-4">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" class="form-control" id="inputEmail"
                                                placeholder="teusman@gbicts.net" value="{{$edit ? $editData->email  : '' }}" wire:model="email">
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPHone">Phone</label>
                                            <input type="number" class="form-control" id="inputPHone"
                                                placeholder="08144161555" value="{{$edit ? $editData->phone  : '' }}" wire:model="phone">
                                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="d-block">Role</label>
                                            <select id="inputState" class="custom-select w-100" wire:model="role">
                                                @if($edit)
                                                <option value="{{$edit ? $editData->role  : '' }}">{{$edit ? $editData->role  : '' }}</option>
                                                @else
                                                <option selected>Choose...</option>
                                                @endif
                                                <option value="admin">Admin</option>
                                                <option value="cashier">Cashier</option>
                                            </select>
                                            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress2">Address</label>
                                        <input type="text" class="form-control" id="inputAddress2"
                                            placeholder="Apartment, studio, or floor" wire:model="address">
                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn primary">{{$edit ? 'Update Record' : 'Add Staff'}}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="resetFilters">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
