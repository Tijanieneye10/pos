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
    protected $listeners = ['storeData', 'destroyCart'];
    // store data
    public function storeData($productId, $name, $price)
    {
        $QTY = 1;
        Cart::add($productId, $name, $QTY, $price)->associate(Product::class);
        $this->emit('alert', ['type' => 'success', 'message' => 'Product added to cart 😀']);
    }

    // increase cart quantity
    public function increaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    // decrease cart quantity
    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }

    // Delete from cart
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        $this->emit('alert', ['type' => 'error', 'message' => 'Product removed from cart. 😀']);
    }

    // Clear everything on cart
    public function destroyCart()
    {
        Cart::destroy();
        $this->emit('alert', ['type' => 'error', 'message' => 'Cart cleared 😱']);
    }

    // Store cart
    public function storeCart(Request $request)
    {
        // from storeTrait
        $this->storeCartItem($request);
        $this->emit('alert', ['type' => 'success', 'message' => 'Sales processed 😊']);
        $this->emit('print');
        $this->destroyCart();
    }
    public function render()
    {
        return view('livewire.sales.shopping-cart');
    }
}
