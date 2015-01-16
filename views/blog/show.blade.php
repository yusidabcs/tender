<div class="container">

	<!-- =========== -->
	<!-- Single Post -->
	<!-- =========== -->

	<section class="blog">

		<div class="row">
			<header class="span12 prime">
				<h3>{{$detailblog->judul}}</h3>
				<p><span class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($detailblog->updated_at))}} <i class="icon-tag"></i><a href="{{URL::to('blog/category/'.$detailblog->kategori->nama)}}">{{$detailblog->kategori->nama}}</a></span></p>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid post">
				<div class="span8">

					<article>

						<p><!-- <img src="http://cambelt.co/600x200/Post Image?color=E55137,EEEEEE" alt=""/> --></p>

						{{$detailblog->isi}}

					</article>

					<hr>


					<!-- Social Share -->
					<div class="share">
						<a onclick="window.open(this.href, 'mywin', 'left=20, top=20, width=500, height=500, toolbar=1, resizable=0'); return false;" href="https://twitter.com/intent/tweet?original_referer={{URL::to('blog/'.$detailblog->slug)}}" > Twitter</a>
						<a onclick="window.open(this.href, 'mywin', 'left=20, top=20, width=500, height=500, toolbar=1, resizable=0'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{URL::to('blog/'.$detailblog->slug)}}" > Facebook</a>
						<!-- <a href="#">Pinterest</a>
						<a href="#">Google</a>
						<a href="#">Email</a> -->
					</div> 
					<hr>
					<div>
						{{$fbscript}}
			{{fbcommentbox(URL::to("blog/".$detailblog->slug), '100%', '5', 'light')}}
					</div>

					<div class="navigate comments clearfix">
						@if(isset($prev))
							<div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
						@else
							<div class="pull-right"></div>
						@endif

						@if(isset($next))
							<div class="pull-right"><a href="{{$next->slug}}">Selanjutnya &rarr;</a></div>
						@else
							<div class="pull-right"></div>
						@endif
					</div>
					<hr />

					<!-- =============== -->
					<!-- Comment Section -->
					<!-- =============== -->

				</div>
				<div class="span4 sidebar">
					<aside>
						<p class="title"><i class="icon-rss"></i> <strong>Artikel Terbaru</strong></p>
						<ul>
							@foreach(recentBlog($detailblog) as $recent)
							<li><a href="{{URL::to('blog/'.$recent->slug)}}">{{$recent->judul}}</a><br /><small>diposting tanggal {{waktu($recent->updated_at)}}</small></li>
							@endforeach
						</ul>
					</aside>

					<aside class="clearfix tags">
						<p class="title"><i class="icon-tag"></i> <strong>Tags</strong></p>
						
						{{ getTags('<span style="text-decoration: underline;"></span>',$tag)}}						
					</aside>
				</div>

			</div>
		</div>

	</section>
</div>