            <div class="gallery-container">
              <div id="image-zoom" style="--url: url('{{ $product->image }}'); --display:none; --zoom-x:0%; --zoom-y:0%;">
                <img id="main-image" src="{{ $product->image }}" alt="{{ $product->name }}">
              </div>
              <div class="thumbs">
                <img class="thumb active" src="{{ $product->image }}" alt="">
                <img class="thumb" src="image/4de2c980-b4e8-4b29-94d3-9fefd7c34fd6.jpg" alt="">
                <img class="thumb" src="image/7db83cbc-cab2-47f5-b665-ffcbf6a582ba.jpg" alt="">
                <img class="thumb" src="image/955f8908377ba74cce951e642c7de39233c1de38edfaef7897571f4ae148.jpg" alt="">
              </div>
            </div>