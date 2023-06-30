@extends('layouts.theshop')
  
    @section('main')
    {{-- @dd($products) --}}

  <x-liste.products :products="$products"/>
  
        
    @endsection
   
 