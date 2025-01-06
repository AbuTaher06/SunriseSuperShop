<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{

use WithPagination;
public $pageSize=12;
public $sort = 'default';
    public $min_price = 0;
    public $max_price = 1000;
protected $paginationTheme = 'bootstrap';

public function setPageSize($size){
   $this->pageSize = $size;

}

public function setSort($sort){
    $this->sort = $sort;
}
    public function render()
    {
        $categories=Category::all();
        if ($this->sort == 'price') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('regular_price', 'asc')
                ->paginate($this->pageSize);
        } elseif ($this->sort == 'price-desc') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('regular_price', 'desc')
                ->paginate($this->pageSize);
        } elseif ($this->sort == 'name') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('name', 'asc')
                ->paginate($this->pageSize);
        } elseif ($this->sort == 'name-desc') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('name', 'desc')
                ->paginate($this->pageSize);
        } elseif ($this->sort == 'newest') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('created_at', 'desc')
                ->paginate($this->pageSize);
        } else {
            // Default sorting or any other unhandled cases
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->paginate($this->pageSize);
        }
        $totalProducts = $products->total();
        $new_products=Product::latest()->take(3)->get();
        return view('livewire.shop-component',[
                'categories' => $categories,
                'products' => $products,
                'totalProducts' => $totalProducts,
                'new_products' => $new_products

            ])
        ->layout('layouts.app');
    }

}
