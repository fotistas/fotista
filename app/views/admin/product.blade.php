@extends('admin/master')

@section('content')

	<div class="row">

		<div class="col-3-4">

			{{ Form::open(array('url' => '', 'method' => 'POST')) }}

				<div id="product-form" class="form">

					<h3>{{ $subtitle }}</h3>

					<div class="row">
						{{ Form::label('name', 'Product name') }}
						<span class="input-wrap input-text-wrap">
							{{ Form::text('name', '', array('name' => 'name', 'placeholder' => 'Product name') ) }}
						</span>
					</div>

					<div class="row">
						{{ Form::label('description', 'Description') }}
						{{ Form::textarea('description', '', array('name' => 'description') ) }}
					</div>

				</div> <!-- /product-form -->

				<div id="product-properties-form" class="form">
					<h3>Product Properties</h3>

					<div class="row">

						<div class="col-1-3">
							<div class="simple-product-field">
								{{ Form::label('price', 'Price:') }}
								<span class="input-wrap input-text-wrap">
									{{ Form::input('number', 'price', '', array('name' => 'price', 'placeholder' => 'Price') ) }}
								</span>
							</div>

							<div class="auction-field">
								{{ Form::label('opening_bid', 'Opening bid:') }}
								<span class="input-wrap input-text-wrap">
									{{ Form::input('number', 'opening_bid', '', array('name' => 'opening_bid', 'placeholder' => 'Price') ) }}
								</span>
							</div>
						</div> <!-- /col-1-3 -->

						<div class="col-1-3">
							<div class="simple-product-field">
								{{ Form::label('salep_price', 'Sale price:') }}
								<span class="input-wrap input-text-wrap">
									{{ Form::input('number', 'salep_price', '', array('name' => 'salep_price', 'placeholder' => 'Sale price') ) }}
								</span>
							</div>
							<div class="auction-field">
								&nbsp;
							</div>
						</div> <!-- /col-1-3 -->

						<div class="col-1-3">
							{{ Form::label('type', 'Product type:') }}
							{{ Form::select('type', array('simple' => 'Simple Product', 'auction' => 'Auction'), $type) }}
						</div> <!-- /col-1-3 -->

					</div> <!-- /row -->

				</div> <!-- /product-properties-form -->

			{{ Form::close() }}

		</div> <!-- /col-3-4 -->

		<div class="col-1-4">

			<div class="widget-container">
				<div class="title">
					Post Info
				</div>
				<div class="content">
					<div class="status">
						Post status: published
					</div>
					<div class="date">
						Post date: 2014-10-07 10:48
					</div>
					<div class="row">
						<div class="float_left">
							<button id="save_product">Save</button>
						</div>
						<div class="float_right">
							<a href="#" class="danger">
								Delete
							</a>
						</div>
					</div>
				</div> <!-- /content -->
			</div> <!-- /widget-container -->

			<div class="widget-container">
				<div class="title">
					Product Image
				</div>
				<div class="content">
					<div class="thumbnail">
						<a href="#" id="upload-thumbnail">Add product image</a>
					</div>

					<!-- http://clivern.com/how-to-create-file-upload-with-laravel/ -->

					{{ Form::open(array('url'=>'form-submit', 'id' => 'upload-thumbnail-form', 'files'=>true)) }}
					{{ Form::file('file', array('id'=>'thumbnail','class'=>'')) }}
					{{ Form::close() }}

				</div> <!-- /content -->
			</div> <!-- /widget-container -->

		</div> <!-- /col-1-4 -->

	</div> <!-- /row -->

@stop