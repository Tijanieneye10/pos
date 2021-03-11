<div>
    @section('title', 'Export Expenses Records')
    <div class="box">
        <div class="box-header">
            <h2>Export Expenses </h2>
            {{-- <small>Manage Staff here</small> --}}
            <div class="box-body">
                <form action="{{ route('expensesRecordsDownload') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="">From Date</label>
                        <input type="date" class="form-control" wire:model.lazy="startDate" name="startDate" required>
                        @error('startDate') <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" wire:model.lazy="endDate" name="endDate" required>
                        @error('endDate') <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Select Format</label>
                        <select name="format" id="" class="form-control" wire:model="docFormat" required>
                            <option value="">Select Format</option>
                            <option value=".xlsx">Excel Sheet</option>
                            <option value=".csv">CSV</option>
                            <option value=".pdf">PDF</option>
                        </select>
                        @error('docFormat') <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn primary">Download</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
