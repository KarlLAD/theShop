<div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
    <div class="md:w-4/12 2xl:w-1/4 w-full">
      <img src="{{Storage::url($itemCart->product->defaultImage)}}" alt="Black Leather Purse" class="h-full object-center object-cover md:block hidden" />
      <img src="{{Storage::url($itemCart->product->defaultImage)}}" alt="Black Leather Purse" class="md:hidden w-full h-full object-center object-cover" />
    </div>
    <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
      <p class="text-xs leading-3 text-gray-800 dark:text-white md:pt-0 pt-4">{{  $itemCart->product->category->name}}</p>
      <div class="flex items-center justify-between w-full">
        <p class="text-base font-black leading-none text-gray-800 dark:text-white">{{  $itemCart->product->name }}</p>
        <select   data-id="{{$itemCart->id}}"  aria-label="Select quantity"   class="cartChangeQuantity py-2 px-1 border border-gray-200 mr-6 focus:outline-none dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
        {{-- boucle dynamique de la quantité dans le panier --}}
          @for ($i=1; $i<=5; $i++)
          <option value="{{$i}}" @selected($itemCart->quantity ==$i)>{{$i}}</option>
          @endfor


        </select>
      </div>
      <p class="text-xs leading-3 text-gray-600 dark:text-white pt-2">Height: 10 inches</p>
      <p class="text-xs leading-3 text-gray-600 dark:text-white py-4">Color: Black</p>
      <p class="w-96 text-xs leading-3 text-gray-600 dark:text-white">{{ $itemCart->product->description}}</p>
      <div class="flex items-center justify-between pt-5">
        <div class="flex itemms-center">
          <p class="text-xs leading-3 underline text-gray-800 dark:text-white cursor-pointer">Add to favorites</p>
          <a href="{{ route('cart-delete-one', $itemCart) }}" class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Supprimer</a>
        </div>
        <p class="text-base font-black leading-none text-gray-800 dark:text-white">{{  $itemCart->product->prix/100}} €</p>
      </div>
    </div>
  </div>