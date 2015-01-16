<!-- =========== -->
<!-- Top section -->
<!-- =========== -->

<div class="header-container">
<div class="container welcome">
	<div class="row-fluid">
		<div class="pull-left greet">

			@if ( ! Sentry::check())
				Selamat berbelanja, {{HTML::link('member', 'Login here')}}
			@else
				Selamat datang {{HTML::link('member', Sentry::getUser()->nama)}}, {{HTML::link('logout', 'logout here')}}
			@endif

		</div>
		<div class="pull-right cart tleft" id='shoppingcartplace'>
			{{$ShoppingCart}}
		</div>
	</div>
</div>

<!-- ================ -->
<!-- Branding section -->
<!-- ================ -->

<div class="container head">
	<div class="row">
		<div class="span12 clearfix">
			<div class="top row">

				@if(@getimagesize(URL::to(getPrefixDomain().'/galeri/'.$toko->logo)))
					<div class="span8 logo image"><a href="{{URL::to('home')}}"><img  src="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}" alt="" /></a></div>
				@else
					<div class="span8 logo text" style=""><a href="{{URL::to('home')}}">{{ Theme::place('title') }}</a></div>
				@endif

				<div class="cart span4">
					<form action="{{URL::to('search')}}" class="topsearch" method='post'>
						<input type="search" class="top-search" placeholder="Search" name="search"/>
						<button type="submit"><i class="icon-search"></i></button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- ================ -->
<!-- Main Nav section -->
<!-- ================ -->

<div class="container-menu">
<div class="container">
	<div class="row">
		<div class="span12">
			<nav class="horizontal-nav full-width">
				<ul class="nav" id="nav">
					@foreach($mainMenu as $key=>$link)
						@if($link->halaman=='1')
							<li><a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a></li>
						@elseif($link->halaman=='2')
							<li><a href={{"'".URL::to("blog/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a></li>
						@elseif($link->url=='1')
							<li><a href={{"'".URL::to('http://'.strtolower($link->linkTo))."'"}}>{{$link->nama}}</a></li>
						@else
							<li><a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a></li>
						@endif
					@endforeach
				</ul>
			</nav>
		</div>
	</div>
</div>
</div>
</div>