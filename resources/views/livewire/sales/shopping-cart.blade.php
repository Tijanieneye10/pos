<div>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <table class="table table-responsive table-hover table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse (Cart::content() as $item)
            <tr class="text-center">
                <td>{{ $item->name }}</td>
                <td>&#8358;{{ $item->price }}</td>
                <td>
                    <span class="badge badge-primary"><i class="fa fa-plus d-inline" style="cursor: pointer"
                            wire:click="increaseQty('{{ $item->rowId }}')"></i></span> {{ $item->qty }}
                    <span class="badge badge-danger"><i class="fa fa-minus d-inline" style="cursor: pointer"
                            wire:click="decreaseQty('{{ $item->rowId }}')"></i></span>
                </td>
                <td><i class="fa fa-times text-danger d-inline" style="cursor: pointer"
                        wire:click="removeCart('{{ $item->rowId }}')"></i></td>
            </tr>
            @empty
            <p>No items in cart</p>
            @endforelse
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td class="text-right"> &#8358;{{ Cart::total()}}</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-primary btn-block mt-3" {{ Cart::count() < 1 ?  'disabled' : ''  }} wire:click="storeCart">Save and Print</button>
    <button class="btn btn-danger btn-block mt-3" {{ Cart::count() < 1 ?  'disabled' : ''  }} wire:click="$emit('destroyCart')">Clear Cart</button>
</div>

<iframe src="{{ route('printer') }}" style="visibility:hidden;" name="frame" id="frame"></iframe>

@push('js')
<script>
        window.livewire.on('print', () =>{
            let myIframe = document.getElementById("frame").contentWindow;
            myIframe.focus();
            myIframe.print();
            return false;
        })
</script>
@endpush

