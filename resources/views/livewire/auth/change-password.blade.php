<div>
    <div class="box">
        <div class="box-header">
            <h2>Change Password</h2>
        </div>
        <div class="box-body">
            <div class="col-md-5">
                <form  wire:submit.prevent="resetPassword">
                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" placeholder="Enter Old Password" class="form-control" wire:model="old">
                        @error('old') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" placeholder="Enter New Password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" placeholder="Confirmed Password"
                            class="form-control" wire:model="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
