<!-- ============== -->
<!-- Footer section -->
<!-- ============== -->

<footer>
	<div class="container">
		<section class="row foot">
			@foreach($tautan as $key=>$group)
            @if($key!=2)
			<article class="span3">
					<strong>{{$group->nama}}</strong>
					<ul>
						@foreach($quickLink as $key=>$link)
				            @if($group->id==$link->tautanId)
							<li>
								@if($link->halaman=='1')
									<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->halaman=='2')
									<a href={{"'".URL::to("blog/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->url=='1')
									<a href="{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
								@else
									<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@endif
							</li>
							@endif
						@endforeach
						<!-- <li><a href="#">About Us</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Returns Policies</a></li>
						<li><a href="#">News</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="#">Contact Us</a></li> -->
					</ul>
			</article>
			@endif
			@endforeach

			<article class="span3">
				<strong>Posting Terbaru</strong>
				<ul>
					@foreach ($blogBaru as $items)
						<li><a href="{{slugBlog($items)}}">{{$items->judul}}</a><br /><small>diposting pada {{waktuTgl($items->created_at)}}</small></li>
					@endforeach
				</ul>
			</article>
			<!-- <article class="span3">
				<strong>Tweets</strong>
				<div id=""></div>
			</article> -->
			<article class="span3">
				<strong>Newsletter</strong>
				<div id="mc_embed_signup">
					<form action="{{@$mailing->action}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form newsletter" class="validate form-inline" target="_blank" novalidate>
                                           <input type="email" value="" placeholder="Enter your email" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL">
					<button type="submit" class="btn" {{ @$mailing->action==''?'disabled="disabled"':'' }}><i class="icon-direction"></i></button>
					</form>
				</div>
				@if($kontak->alamat!='')
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-location"></i></div>
						<div class="pull-left cdata">{{$kontak->alamat}}, {{$kota->nama}}</div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-phone"></i></div>
						<div class="pull-left cdata">{{$kontak->telepon}}</div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-mail"></i></div>
						<div class="pull-left cdata"><a href="mailto:{{$kontak->email}}" target="_top">{{$kontak->email}}</a></div>
					</address>
					@if($kontak->bb!='')
					<address class="row-fluid">
						<div class="pull-left clabel"><img src="{{URL::to('img/bbm.png')}}"></div>
						<div class="pull-left cdata"><a href="#">{{$kontak->bb}}</a></div>
					</address>
					@endif
					<address class="row-fluid">
						<div class="pull-left clabel"></div>
						<div class="pull-left cdata">{{ymyahoo($kontak->ym)}}</div>
					</address>
				@else
					<div></div>
				@endif
			</article>
		</section>

	</div>
	<section class="row-fluid doubleline">
			<div class="container">
			<div class="span6">
				<!-- <div class="payment amex"></div>
					<div class="payment mastercard"></div>

					<div class="payment visa"></div>

					<div class="payment paypal"></div>-->
					@foreach($bank as $value)
						<img style="" src="{{URL::to('img/'.$value->bankdefault->logo)}}" alt="{{$value->bankdefault->logo}}" />
					@endforeach
			</div>
			</div>
		</section>

		<section class="row-fluid social">
			<div class="container">

			<div class="pull-left">&copy; {{date('Y')}} {{ Theme::place('title') }}. Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a> </div>

			<div class="pull-right">
				<ul>
					@if($kontak->fb)
						<li><a target="_blank" href="{{URL::to($kontak->fb)}}"><i class="icon-facebook"></i></a></li>
					@endif
					@if($kontak->tw)
						<li><a target="_blank" href="{{URL::to($kontak->tw)}}"><i class="icon-twitter"></i></a></li>
					@endif
					@if($kontak->gp)
						<li><a target="_blank" href="{{URL::to($kontak->gp)}}"><i class="icon-gplus"></i></a></li>
					@endif
					@if($kontak->pt)
						<li><a target="_blank" href="{{URL::to($kontak->pt)}}"><i class="icon-pinterest"></i></a></li>
					@endif
					@if($kontak->tl)
						<li><a target="_blank" href="{{URL::to($kontak->tl)}}"><i class="icon-tumblr"></i></a></li>
					@endif
					@if($kontak->ig)
						<li><a target="_blank" href="{{URL::to($kontak->ig)}}"><i class="icon-instagrem"></i></a></li>
					@endif
				</ul>
			</div>
			</div>
		</section>
	
</footer>
{{pluginPowerup()}}
