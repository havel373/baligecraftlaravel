<x-User-Layout title="Detail Produk">
    <div class="product_image_area">
        <div class="container">
            @if(session('error'))
                <p class="text-danger text-center">{!! session('error') !!}</p>
            @endif
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" style="max-width: 100%;" src="{{$produk->image}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$produk->nama}}</h3>
                        <h2>Rp.</h2><h2 id="harga_produk">{{number_format($produk->harga)}}</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Kategori</span> : {{$produk->category->kategori_nama}}</a></li>
                            </br>
                            <li><a class="active" href="#"><span>Penjual</span> : {{ $produk->penjual ?  $produk->penjual->nama : ''}}</a></li>
                        </br>
                            <li><a href="#"><span>Stok</span> : {{ $produk->kuantitas }}</a></li>
                        </ul>
                        <p>{{$produk->deskripsi_pendek}}</p>
                        <form action="('produk/save_cartulos')" method="post">
                            <h4 style="margin-bottom: 20px; font-size: 18px;">Pilih Jenis Model Ulos </h4>
                            <div class="controls">
                                <select id="model" name="model" class="form-control" required>
                                    <option value="">Pilih Model</option>
                                    @foreach($models as $model)
                                        <option value="{{$model->id}}">{{$model->nama_model}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </br>
                            <div class="controls">
                                <select id="harga_model" name="harga_model" class="form-control">
                                    <option value="">Harga Model</option>
                                </select>
                            </div>
                            <div class="product_count">
                                <a class="button primary-btn" href="#bukti" data-toggle="modal" style="border-radius: 5px; margin-bottom: 20px; margin-top: 20px;">Lihat Contoh Model Ulos</a>
                            </div>
                        </form>
                        <div class="product_count">
                            <form action="{{route('ulos.store')}}" method="post">
                                @if($produk->kuantitas > 0)
                                <label for="qty">Kuantitas :</label>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                                @endif
                                <input type="number" class="buyfield" name="qty" value="1" min="1" />
                                <input type="hidden" class="buyfield" name="produk_id" value="{{ $produk->id}}" />
                                <input type="hidden" class="buyfield" name="penjual" value="{{ $produk->user_id}}" />
                                <input type="hidden" name="harga_awal" id="harga_awal" value="{{$produk->harga}}">
                                <input type="hidden" name="harga_akhir" id="harga_akhir">
                                @csrf
                                @auth
                                    <input type="submit" class="button primary-btn" name="submit" value="Buy Now" />
                                @endauth
                                @guest
                                    <a class="button primary-btn" name="submit" href="{{ route('auth.index')}}">Buy Now</a>
                                @endguest
                            </form>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 450px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($models as $model)
                    <div class="container-fluid">
                        <div class="card mb-2">
                            <div class="card-header">
                                <h4 class="modal-title text-dark" id="myModalLabel" style="margin-bottom: 25px; font-weight: 600;">{{$model->nama_model}}</h4>
                                <figure class="course-thumbnail-go">
                                    <center>
                                        <img src="{{asset('storage/'.$model->gambar)}}" alt="" style="max-width: 50%;">
                                    </center>
                                </figure>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--================Product Description Area =================-->
    <section id="newsletter" class="newsletter">
		<div class="container">
			<div class="hm-footer-details">
				<div class="row">
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>information</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Beranda</a></li>
									<!--/li-->
									<li><a href="#">Produk</a></li>
									<!--/li-->
									<li><a href="#">Tentang</a></li>
									<!--/li-->
									<li><a href="#">Kontak Kami</a></li>
									<!--/li-->
								</ul>
								<!--/ul-->
							</div>
							<!--/.hm-foot-menu-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>Kategori Produk</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Aksesoris</a></li>
									<!--/li-->
									<li><a href="#">Busana</a></li>
									<!--/li-->
									<li><a href="#">Perlengkapan Rumah</a></li>
									<!--/li-->
									<li><a href="#">Sepatu</a></li>
									<!--/li-->
									<li><a href="#">Ulos</a></li>
									<!--/li-->
									<li><a href="#">Souvenir</a></li>
								</ul>
								<!--/ul-->
							</div>
							<!--/.hm-foot-menu-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>Layanan</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Custom Ulos</a></li>
									<!--/li-->
									<li><a href="#">Buka Toko</a></li>
									<!--/li-->
								</ul>
								<!--/ul-->
							</div>
							<!--/.hm-foot-menu-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
					<div class=" col-md-3 col-sm-6  col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>Contact Us</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-para">
								<p>
									Daftarkan Email Anda
								</p>
							</div>
							<!--/.hm-foot-para-->
							<div class="hm-foot-email">
								<div class="foot-email-box">
									<input type="text" class="form-control" placeholder="Masukkan Email Disini...">
								</div>
								<!--/.foot-email-box-->
								<div class="foot-email-subscribe">
									<span><i class="fa fa-location-arrow"></i></span>
								</div>
								<!--/.foot-email-icon-->
							</div>
							<!--/.hm-foot-email-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
				</div>
				<!--/.row-->
			</div>
			<!--/.hm-footer-details-->

		</div>
		<!--/.container-->

	</section>
    @section('custom_js')
    <script src="{{asset('js/jquery-2.1.1.min')}}" type="text/javascript"></script>
    <script>
       $('#model').change(function(){
            $.ajax({
                url: "{{route('get_harga_model')}}",
                method: "POST",
                data: {
                    id : $('#model').val(),
                    harga_awal : $('#harga_awal').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    $('#harga_model').html(result);
                    $('#harga_produk').html( thousand(parseInt($('#harga_awal').val()) + parseInt($('#harga_model').val())) );
                    $('#harga_akhir').val(parseInt($('#harga_awal').val()) + parseInt($('#harga_model').val()));
                }
            });
        });
        function highlightStar(obj, id) {
            removeHighlight(id);
            $('#rate-' + id + ' li').each(function(index) {
                $(this).addClass('highlight');
                if (index == $('#rate-' + id + ' li').index(obj)) {
                    return false;
                }
            });
        }

        // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
        function removeHighlight(id) {
            $('#rate-' + id + ' li').removeClass('selected');
            $('#rate-' + id + ' li').removeClass('highlight');
        }

        function addRating(obj, id) {
            $('#rate-' + id + ' li').each(function(index) {
                $(this).addClass('selected');
                $('#rate-' + id + ' #rating').val((index + 1));
                if (index == $('#rate-' + id + ' li').index(obj)) {
                    return false;
                }
            });
        }

        function resetRating(id) {
            if ($('#rate-' + id + ' #rating').val() != 0) {
                $('#rate-' + id + ' li').each(function(index) {
                    $(this).addClass('selected');
                    if ((index + 1) == $('#rate-' + id + ' #rating').val()) {
                        return false;
                    }
                });
            }
        }
    </script>
    @endsection
    <script>
         
    </script>
</x-User-Layout>