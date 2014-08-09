@extends('master')

@section('content')
	<!-- Slider -->
	<div class="container">
		<div class="flexslider" id="top-slider">
			<ul class="slides">
				<li>
					<img src="images/slider/nixon-watch-advertising.jpg" />
				</li>
				<li>
					<img src="images/slider/Panerai-Watch_Advertising_Wallpaper_1024x768.jpg" />
				</li>
				<li>
					<img src="images/slider/watch-advertising.jpg" />
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery('#top-slider').flexslider({
				controlNav: false,
				slideshowSpeed: 6000,
			});
		</script>
	</div>

	<!-- Store -->
	<div class="container">

		<div class="section">
			<div class="row">
				<div class="section-title float_left">Featured Products</div>
				<div class="view-all float_right">
					<a href="#">
						<span class="fa fa-eye"></span>
						View all
					</a>
				</div>
			</div>

			<div class="product-list grid">

				<div class="product sale col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/Luxury-Men-Watch-Black-Steel-wrist-Watch-Sport-Styles-top-brand-Men_300.jpg" />
							</div>
							<div class="price">
								<del>
									<span class="amount">500</span> $
								</del>
								<ins>
									<span class="amount">300</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Black Luxury Watch</div>
					<div class="description">
						<div class="text">
							Luxury Men Watch Black Steel wrist Watch Sport Styles top brand Men
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

				<div class="product sale col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/Youyoupifa-Fashion-Luxury-Imitationold-Quartz-Wrist-Watch-1_300.jpg" />
							</div>
							<div class="price">
								<del>
									<span class="amount">700</span> $
								</del>
								<ins>
									<span class="amount">570</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Youyoupifa</div>
					<div class="description">
						<div class="text">
							Youyoupifa Fashion Luxury Imitationold Quartz Wrist Watch
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

				<div class="product col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/Vantasy-Mens-Luxury-Gold-Plated-Stainless-Steel-Hand-Wind-Skeleton-Analog-Mechanical-Black-Leather-Wrist-Watch-3_300.jpg" />
							</div>
							<div class="price">
								<ins>
									<span class="amount">1300</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Bossman Watch</div>
					<div class="description">
						<div class="text">
							Vantasy Men’s Luxury Gold Plated Stainless Steel Hand Wind Skeleton Analog Mechanical Black Leather Wrist Watch
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

				<div class="product col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/PMW079-0-11_300.jpg" />
							</div>
							<div class="price">
								<ins>
									<span class="amount">1050</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Oblong</div>
					<div class="description">
						<div class="text">
							Mens Luxury Oblong Skeleton Automatic Mechanical Black Leather Wrist Watch Cool
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

			</div> <!-- /product-list -->

		</div> <!-- section -->


		<div class="section">
			<div class="row">
				<div class="section-title float_left">New Products</div>
				<div class="view-all float_right">
					<a href="#">
						<span class="fa fa-eye"></span>
						View all
					</a>
				</div>
			</div>

			<div class="product-list grid">

				<div class="product col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/1df5c213d7bb_300.jpg" />
							</div>
							<div class="price">
								<ins>
									<span class="amount">1450</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Wind</div>
					<div class="description">
						<div class="text">
							Vantasy Roman Men’s Luxury Stainless Steel White Dial Skeleton Analog Hand Wind Mechanical Black Leather Wrist Watch – Wind
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

				<div class="product col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/aqua_300.jpg" />
							</div>
							<div class="price">
								<ins>
									<span class="amount">1250</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">The Aquarium</div>
					<div class="description">
						<div class="text">
							Swiss watch company Angular Momentum represent its new model called “The Aquarium.” Aquarium shows a popular in Far East fish – Koi – in a muddy pond. It’s engraved in very high relief 925 silver, purple gold and Ruthenium treated surface. The eye of a koi made out from a diamond and the ground is done in black Ishime Urushi natural lacquer. The watch case is in Staybrite steel with polished and satin finished surfaces measuring 43mm wide by 16mm thick. The time is shown by single disc that spins behind the koi. These extremely beautiful luxury watches will be availiable in limited edition soon.
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

				<div class="product col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/Hublot-key-of-time_300.jpg" />
							</div>
							<div class="price">
								<ins>
									<span class="amount">1890</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Key of Time</div>
					<div class="description">
						<div class="text">
							The “Key of Time” is impressive novelty piece from Hublot’s 2011 Masterpiece Collection. The name comes from the watch’s time-travelling ability, through 3 speed settings. For instance, you’re in a boring meeting and you can speed up the time or if it’s happy hour, you can slow it down. Of course this is just for fun, with the ingenious engineers also giving this watch the ability to return to the correct time, though its “mechanical memory”.
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

				<div class="product col-1-4">
					<a href="#">
						<div class="thumbnail transition">
							<div class="img-wrap">
								<img src="images/product/Harry-Winston-Opus-11_300.jpg" />
							</div>
							<div class="price">
								<ins>
									<span class="amount">1890</span> $
								</ins>
							</div>
						</div>
					</a>
					<div class="title">Opus Eleven</div>
					<div class="description">
						<div class="text">
							The Opus Eleven Watch is part of a numbered series of collaborative timepieces, which have gathered some of the most talented watchmakers to create for each one. This remarkable piece took over 14,400 hours to engineer alone. Using an complex system of gears and disks, the dial ‘explodes’ then reforms to display the time.
						</div>
					</div>
					<div class="more-details">
						<a href="#">
							<span class="fa fa-angle-right"></span>
							More Details
						</a>
					</div>
				</div>

			</div> <!-- /product-list -->

		</div> <!-- /section -->

	</div> <!-- /container -->
@stop