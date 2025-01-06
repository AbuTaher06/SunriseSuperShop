<?php

use App\Livewire\Blog;
use App\Models\Category;
use App\Livewire\CartComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ShopComponent;
use App\Livewire\ContactComponent;
use App\Livewire\DetailsComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\CheckoutComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\SearchComponent;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/',HomeComponent::class)->name('home');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/details/{slug}',DetailsComponent::class)->name('details');
Route::get('/product-category/{slug}',CategoryComponent::class)->name('product.category');
Route::get('/search-product',SearchComponent::class)->name('product.search');
Route::get('/wishlist',DetailsComponent::class)->name('wishlist');
Route::get('/blog',Blog::class)->name('blog');
Route::get('contact',ContactComponent::class)->name('contact');

Route::middleware((['auth','admin']))->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::post('/register', [ProfileController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/logout', function () {
//     // Remove all session data
//     Session::flush();

//     return response()->json(['message' => 'All session data has been destroyed.']);
// });

require __DIR__.'/auth.php';
