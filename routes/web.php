<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
