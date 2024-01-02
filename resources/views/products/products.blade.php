<?php @include('layouts.header'); ?>
<style>
.grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    padding: 70px;
}
.grid-item {
    #background-color: #2196F3;
    border: 1px solid rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 30px;
    text-align: center;
}
</style>
<div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
    <div class="u-gutter-0 u-layout">
        <div class="u-layout-row grid-container">
            @foreach ($products as $product)
            <div class="grid-item u-align-center u-container-style u-layout-cell u-left-cell u-size-15 u-size-30-md u-layout-cell-1">
                <div class="u-border-1 u-border-grey-30 u-container-layout u-valign-middle u-container-layout-1">
                    <h2 class="u-text u-text-3">{{ $product->name }}</h2>
                    <h3 class="u-text u-text-4">₹{{ $product->price }}</h3>
                    <p class="u-text u-text-5">{{ $product->description }}
                    </p>
                    <a href="{{ route('checkout', $product->id) }}" class="u-border-radius-50 u-btn u-btn-round u-button-style u-palette-3-base u-btn-1">BUy Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<?php @include('layouts.footer'); ?>