@include('admin.header')

<!-- =======================
Content START -->
<section class="pt-0">
	<div class="container vstack gap-4">
		<!-- Hotel list START -->
        <div class="row g-4">
            <!-- Title -->
            <div class="col-12">
                <h4 class="mb-3">Articles</h4>
            </div>

            <div class="row">
                @foreach ($cart->items as $item)
                    <div class="col-lg-6">
                        <div class="card shadow p-3">
                            <div class="row g-4">
                                <!-- Card img -->
                                <div class="col-sm-3">
                                    <img src="{{ asset('img/shop/catalog/' . $item['product_image']) }}" class="rounded-2" alt="{{ $item['product_name'] }}">
                                </div>
            
                                <!-- Card body -->
                                <div class="col-sm-9">
                                    <div class="card-body position-relative d-flex flex-column p-0 h-100">
                                                    
                                        <!-- Title -->
                                        <h5 class="card-title mb-0 me-5">{{ $item['product_name'] }}</h5>
            
                                        <!-- Price and Button -->
                                        <div class="d-flex justify-content-between align-items-center mt-3 mt-md-auto">
                                            <!-- Price -->
                                            <div class="d-flex align-items-center">
                                                <h5 class="fw-bold mb-0 me-1">{{ number_format($item['product_price'], 0, ',', ' ') }} FCFA</h5>
                                                
                                            </div>
                                            <!-- Button -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Hotel list END -->
	</div>
    
</section>
<!-- =======================
Content END -->


<!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')