<?php

namespace App\Livewire;

use Flasher\Prime\FlasherInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    // Listening for refreshCart event
    protected $listeners = [
        'refreshCart' => '$refresh',
    ];

    public function increaseQuantity($value)
    {
        $product = Cart::instance('cart')->get($value);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($value, $qty);
        // Emit to a specific component
        $this->dispatch('cart-icon-component', 'refreshCart');
    }

    public function decreaseQuantity($value)
    {
        $product = Cart::instance('cart')->get($value);
        $qty = max(0, $product->qty - 1); // Ensure quantity doesn't go negative
        Cart::instance('cart')->update($value, $qty);

        $this->dispatch('cart-icon-component', 'refreshCart'); // Use emitTo instead of emit
    }

    public function destroy($value)
    {
        Cart::instance('cart')->remove($value);
        flash()->success('Product removed from cart successfully');

        $this->emitTo('cart-icon-component', 'refreshCart'); // Use emitTo instead of emit
    }

    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        flash()->success('All Cart items cleared successfully');

        $this->emitTo('cart-icon-component', 'refreshCart'); // Use emitTo instead of emit
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.app');
    }
}
