@extends('layouts.theshop')


@section('main')

<section class="flex flex-col lg:flex-row w-full px-5 xl:px-12">
  <div class="flex w-full h-full flex-col">

    @forelse ($cartItems as $itemCart)

    <x-liste.item-cart :itemCart="$itemCart"/>
    @empty
    <h1 class="text-red-700"> Votre panier est vide !</h1>
     
    @endforelse


  </div>

{{-- colonne 2 --}}

  <div class="flex w-full h-full">

    <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 dark:bg-gray-900 h-full">
      <div class="flex flex-col lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto">
        <div>
          <p class="lg:text-4xl text-3xl font-black leading-9 text-gray-800 dark:text-white">Summary</p>
          <div class="flex items-center justify-between pt-16">
            <p class="text-base leading-none text-gray-800 dark:text-white">Subtotal</p>
            <p class="text-base leading-none text-gray-800 dark:text-white">,000</p>
          </div>
          <div class="flex items-center justify-between pt-5">
            <p class="text-base leading-none text-gray-800 dark:text-white">Shipping</p>
            <p class="text-base leading-none text-gray-800 dark:text-white"></p>
          </div>
          <div class="flex items-center justify-between pt-5">
            <p class="text-base leading-none text-gray-800 dark:text-white">Tax</p>
            <p class="text-base leading-none text-gray-800 dark:text-white"></p>
          </div>
        </div>
        <div>
          <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
            <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
            <p class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white">,240</p>
          </div>
          <button onclick="checkoutHandler1(true)" class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white dark:hover:bg-gray-700">Checkout</button>
          <a class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white dark:hover:bg-gray-700">Vider le panier</a>
        </div>
      </div>
    </div>
  </div>


  </div>

</section>


<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

@endsection

