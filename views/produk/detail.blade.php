<section class="single">

<div class="row">

	<header class="span12 prime">

		<h3>{{$produk->nama}}</h3>

	</header>

</div>



<div class="row">



	<div class="span5">



		<!-- Product Images -->

		<div class="wrap">

			<div id="flexslider-product" class="flexslider">

			  <ul class="slides">

			    @if($produk->gambar1!='')			  	

			    <li><a href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}"> {{HTML::image(getPrefixDomain().'/produk/'.$produk->gambar1)}}</a></li>

			  	@endif

			  	@if($produk->gambar2!='')			  	

			    <li><a href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar2)}}"> {{HTML::image(getPrefixDomain().'/produk/'.$produk->gambar2)}}</a></li>

			  	@endif

			  	@if($produk->gambar3!='')			  	

			    <li><a href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar3)}}"> {{HTML::image(getPrefixDomain().'/produk/'.$produk->gambar3)}}</a></li>

			  	@endif

			  	@if($produk->gambar4!='')			  	

			    <li><a href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar4)}}"> {{HTML::image(getPrefixDomain().'/produk/'.$produk->gambar4)}}</a></li>

			  	@endif

			  </ul>				  

			</div>



			<div id="flexcarousel-product" class="flexslider visible-desktop">

			  <ul class="slides">

			   @if($produk->gambar1!='')			  	

			    <li>{{HTML::image(getPrefixDomain().'/produk/thumb/'.$produk->gambar1)}}</li>

			  	@endif

			  	@if($produk->gambar2!='')			  	

			    <li>{{HTML::image(getPrefixDomain().'/produk/thumb/'.$produk->gambar2)}}</li>

			  	@endif

			  	@if($produk->gambar3!='')			  	

			    <li>{{HTML::image(getPrefixDomain().'/produk/thumb/'.$produk->gambar3)}}</li>

			  	@endif

			  	@if($produk->gambar4!='')			  	

			    <li>{{HTML::image(getPrefixDomain().'/produk/thumb/'.$produk->gambar4)}}</li>

			  	@endif

			  </ul>

			</div>



		</div>



	</div>



	<div class="span7">



		<!-- Product Info -->

		<div class="details wrapper well">



			<!-- <p><small>@if($produk->dmt!='')

				&#8220;{{ ucwords($produk->dmt)}}&#8221;

				@endif

			</small></p> -->
			@if($setting->checkoutType=='1')

			<p class="price"><i class="icon-tag"></i> {{ jadiRUpiah($produk->hargaJual) }} <small style="font-size: 14px;"><span style='text-decoration:line-through'>{{ jadiRUpiah($produk->hargaCoret) }}</span></small></p>



			<form action="#" id='addorder'>

				

				@if($opsiproduk->count()>0)					

					<select name="opsiproduk">

						<option value="">-- Pilih Opsi --</option>

						@foreach ($opsiproduk as $key => $opsi)

						<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >

							

							{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}

							

						</option>

						@endforeach

					</select>

					</p>

					

				@endif				

				<div class="clearfix">

					<div class="pull-left">

						<input type="text" class="span1" name='qty' value="1">

					</div>

					<div class="pull-left">&nbsp;&nbsp;<input type='submit' class="btn theme" value='Tambah ke keranjang'></div>

				</div>

			</form>

			@elseif($setting->checkoutType=='2')

			<form action="#" id='addorder'>				

				@if($opsiproduk->count()>0)					

					<select name="opsiproduk">

						<option value="">-- Pilih Opsi --</option>

						@foreach ($opsiproduk as $key => $opsi)

						<option value="{{$opsi->id}}">

							{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} 							

						</option>

						@endforeach

					</select>

					</p>

					

				@endif				

				<div class="clearfix">

					<div class="pull-left">

						<input type="text" class="span1" name='qty' value="1">

					</div>

					<div class="pull-left">&nbsp;&nbsp;<input type='submit' class="btn theme" value='Tambah ke keranjang'></div>

				</div>

			</form>

			@elseif($setting->checkoutType=='3')

			<p class="price"><i class="icon-tag"></i> {{ jadiRUpiah($produk->hargaJual) }} <small style="font-size: 14px;"><span style='text-decoration:line-through'>{{ jadiRUpiah($produk->hargaCoret) }}</span></small></p>

				@if(@$po)
			      	<br>
		          	<div>
		            	<p>
			              	Tanggal mulai pemesanan : {{waktuDbBalik($po->tanggalmulai)}}<br>
			              	@if($po->kuota=='0')
			                	Tanggal akhir pemesanan : {{waktuDbBalik($po->tanggalakhir)}}
				            @elseif($po->tanggalakhir=='0000-00-00')
			                	Kuota minimum proses pre-order : {{$po->kuota}}
			              	@endif
			              	<br>
			            	DP : {{$po->dp}}
		            	</p>
		          	</div>

		          	@if((strtotime($po->tanggalmulai)<=strtotime(date('Y-m-d'))) && (($po->kuota!=0) || ($po->tanggalakhir!='0000-00-00' && strtotime($po->tanggalakhir)>=strtotime(date('Y-m-d'))) ) )
			          	<form action="#" id='addorder'>

							@if($opsiproduk->count()>0)					

								<select name="opsiproduk">

									<option value="">-- Pilih Opsi --</option>

									@foreach ($opsiproduk as $key => $opsi)

									<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >

										{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}


									</option>

									@endforeach

								</select>

								</p>

								

							@endif				

							<div class="clearfix">

								<div class="pull-left">

									<input type="text" class="span1" name='qty' value="1">

								</div>

								<div class="pull-left">&nbsp;&nbsp;<input type='submit' class="btn theme" value='Pre-order Item'></div>

							</div>

						</form>
						
						 @else

			    			<p>Belum memasuki periode pemesanan</p>
				
					@endif
			    
			    @else

			    	<p>Belum memasuki periode pemesanan</p>

			    @endif

			@endif
			

			{{pluginTrustklik()}}

			<hr>

			<div class="row-fluid">

				<div class="span6 decidernote">Bingung memilih? tanyalah teman :)</div>

				<div class="span6 decider">

					<a onclick="windowsNew(this.href); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{URL::to(slugProduk($produk))}}"><i class="icon-facebook-circled"></i></a>

					<a onclick="windowsNew(this.href); return false;" href="https://twitter.com/intent/tweet?original_referer={{URL::to(slugProduk($produk))}}" ><i class="icon-twitter-circled"></i></a>

					<!-- <a href="#"><i class="icon-gplus-circled"></i></a>

					<a href="#"><i class="icon-pinterest-circled"></i></a>

					<a href="#"><i class="icon-mail"></i></a> -->

				</div>

			</div>



			<hr>



			<!-- Product details -->



			<div class="accordion" id="accordion2">

			  <div class="accordion-group">

			    <div class="accordion-heading">

			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#description">

			        <i class="icon-layout theme"></i> Deskripsi

			      </a>

			    </div>

			    <div id="description" class="accordion-body collapse">

			      <div class="accordion-inner">

			      	{{$produk->deskripsi}}

			      </div>

			    </div>

			  </div>			  

			</div>



		</div>



	</div>

</div>



<!-- ================== -->

<!-- Cross-sell section -->

<!-- ================== -->



<div class="row">

	<div class="span12">

		<div class="cross-wrapper">

			<hr />

			<header>Produk yang mungkin anda suka</header>



			<section class="row-fluid cross-product">

				@foreach($produklain as $myproduk)

				<article class="span3" style="position: relative;">

					{{is_terlaris($myproduk)}}

                    			{{is_produkbaru($myproduk)}}

                    			{{is_outstok($myproduk)}}

					<div style="height: 220px;" class="view view-thumb">

						{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama)}}

						<div class="mask">

							<h2>{{jadiRupiah($myproduk->hargaJual)}}</h2>

				            <p>{{shortDescription($myproduk->deskripsi,100)}}</p>

				            <a href="{{slugProduk($myproduk)}}" class="info">Lihat</a> 

						</div>

					</div>

					<p class="product-title"><a href="{{slugProduk($myproduk)}}">{{$myproduk->nama}}</a></p>

				</article>

				@endforeach

			</div>



		</div>

	</div>

</div>

</section>
