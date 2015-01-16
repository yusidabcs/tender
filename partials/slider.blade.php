<div class="slides home-span12">
<div class="container">
	
	<div id="flexslider" class="flexslider row">
	  <ul class="slides span12">

	    <!-- Sample slider with text caption -->
	    @foreach ($slideshow as $val)
            <li>
                <img alt="{{ $val->text }}" src="{{URL::to(getPrefixDomain().'/galeri/'.$val->gambar.'?'.Time())}}" />
                @if($val->text!='')
		<p class="flex-caption">{{ $val->text }}</p>
		@endif
            </li>
            @endforeach
	    

	  </ul>
	</div>
	
</div>
</div>
