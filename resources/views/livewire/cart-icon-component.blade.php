<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="cart.html">
            <img alt="Surfside Media" src="{{asset('/')}}assets/imgs/theme/icons/icon-cart.svg">
            @if(Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @foreach(Cart::instance('cart')->content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="product-details.html"><img alt="Surfside Media" src="{{$item->model->image}}"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="product-details.html">{{$item->name}}</a></h4>
                        <h4><span>{{$item->qty}} × </span>{{$item->price}}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small" wire:click.prevent="destroy('{{$item->rowId}}')"></i></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>&#2547;{{Cart::instance('cart')->total()}}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('cart')}}" class="outline">View cart</a>
                    <a href="{{route('checkout')}}">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
