<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartIconComponent extends Component
{
    protected $listeners = [
        'refreshCart' => '$refresh'

    ];

    public function refreshCart()
    {
        $this->dispatchTo('cart-component', 'refreshCart');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);

        flash()->success('Product removed from cart successfully');
        $this->dispatchTo('cart-component', 'refreshCart');
    }
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
