<h1> {{$heading}}</h1>

{{-- 
@if (count($listings)==0)

<h2>No listings here!</h2>

@endif --}}


@unless (count($listings)== 0 )
    

@foreach ($listings as $listing)

<h2>
     {{$listing['title']}}
</h2>

<p> 
    {{$listing['description']}} 
</p>
 
@endforeach 

@else

<h2>No listings here!</h2>
@endunless