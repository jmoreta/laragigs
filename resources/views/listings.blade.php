@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

<h1> {{$heading}}</h1>

<div class="bg-gray-50 border border-gray-200 rounded p-6">

@unless (count($listings)== 0 )
    

@foreach ($listings as $listing)

<x-listing-card :listing="$listing"/>
 
@endforeach 

@else

<h2>No listings here!</h2>
@endunless

</div>
@endsection
