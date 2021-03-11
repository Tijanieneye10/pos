<div>
    <div class="box">
        <div class="box-header">
            <h2>Manage Staff</h2>
            <small>Manage Staff here</small>
            @livewire('form.register-form')
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
                                <i class="fa fa-times text-danger d-inline" style="cursor: pointer"
                                    onclick="confirm('Do you want to delete staff')"
                                    wire:click.prevent="destroyStaff({{ $user->id }})"></i>
                                <i class="fa fa-edit text-primary d-inline" style="cursor: pointer"
                                    wire:click.prevent="$emit('editStaff', {{ $user->id }})" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



