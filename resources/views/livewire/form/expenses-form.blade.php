<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Add Expenses</button>
        
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="resetFilters">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                            <small>Expenses</small>
                            <div class="box-body">

                                <form
                                    wire:submit.prevent="@if($edit) updateExpense({{ $editData->id }}) @else  addExpense  @endif ">
                                    <div class="form-group">
                                        <label for="inpuName4">Title</label>
                                        <input type="text" class="form-control" id="inpuName1" placeholder="Title"
                                            value="{{$edit ? $title : '' }}" wire:model.debounce.700ms="title" required>
                                        @error('title') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-row">
                                        <label for="inpuName4">Amount</label>
                                        <input type="number" class="form-control" id="inpuName2" placeholder="Amount"
                                            value="{{$edit ? $amount : '' }}" wire:model.debounce.700ms="amount"
                                            required>
                                        @error('amount') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Date</label>
                                        <input type="date" name="" class="form-control" wire:model.debounce.700ms="date"
                                            value="{{$edit ? $date : '' }}>
                                        @error('date') <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Description</label>
                                        <textarea name="" cols="30" rows="5" class="form-control"
                                            wire:model.lazy="description">{{ $edit ? $description : ''  }}</textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn primary">{{$edit ? 'Update Record' : 'Add Expenses'}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            wire:click="resetFilters">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
