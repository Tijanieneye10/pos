<?php

namespace App\Http\Livewire\Sales;

use App\Models\Product;
use Livewire\Component;
use Livewire\StoreTrait;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class ShoppingCart extends Component
{
    use StoreTrait;
    protected $listeners = ['storeData', 'destroyCart', 'afterPrint'];

    // store data
    public function storeData($productId, $name, $price)
    {
        $QTY = 1;
        Cart::add($productId, $name, $QTY, $price)->associate(Product::class);
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Product added to cart 😊']);
        $this->emit('reloadReceiptIframe');
    }

    // increase cart quantity
    public function increaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emit('reloadReceiptIframe');
    }

    // decrease cart quantity
    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emit('reloadReceiptIframe');
    }

    // Delete from cart
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        $this->emit('alert', ['type' => 'error', 'message' => 'Product removed from cart. 😀']);
        $this->emit('reloadReceiptIframe');
    }

    // Clear everything on cart
    public function destroyCart()
    {
        Cart::destroy();
        $this->dispatchBrowserEvent('alert',  ['type' => 'error', 'message' => 'Cart cleared 😱']);
        $this->emit('reloadReceiptIframe');
    }

    // Store cart
    public function storeCart(Request $request)
    {
        // from storeTrait
        $this->storeCartItem($request);
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Sales processed 😊']);
        $this->emit('print');
    }

    // Once a job is send to printer, after print clear cart
    public function afterPrint()
    {
        $this->destroyCart();
    }

    public function render()
    {
        return view('livewire.sales.shopping-cart');
    }
}
