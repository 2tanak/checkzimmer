<div class="modal-overlay slider-modal-overlay">
    <div class="modal-close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.2514 24.0004C23.0614 24.0004 22.8714 23.9304 22.7214 23.7804L12.0014 13.0604L1.28141 23.7804C0.991406 24.0704 0.511406 24.0704 0.221406 23.7804C-0.0685937 23.4904 -0.0685937 23.0104 0.221406 22.7204L10.9414 12.0004L0.221406 1.28043C-0.0685937 0.99043 -0.0685937 0.51043 0.221406 0.22043C0.511406 -0.0695703 0.991406 -0.0695703 1.28141 0.22043L12.0014 10.9404L22.7214 0.22043C23.0114 -0.0695703 23.4914 -0.0695703 23.7814 0.22043C24.0714 0.51043 24.0714 0.99043 23.7814 1.28043L13.0614 12.0004L23.7814 22.7204C24.0714 23.0104 24.0714 23.4904 23.7814 23.7804C23.6314 23.9304 23.4414 24.0004 23.2514 24.0004Z" fill="white"/>
        </svg>
    </div>
    <div class="slider-block">
        <div class="big-slider">
            @if ($hotel->photoMain())
                <div class="slider-item"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></div>
            @endif
            @foreach ($hotel->photos() as $key => $photo)
                <div class="slider-item"><img src="{{ $photo['url_original'] }}" alt="alt"></div>
            @endforeach
        </div>
        <div class="small-slider">
            @if ($hotel->photoMain())
                <div class="slider-item"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></div>
            @endif
            @foreach ($hotel->photos() as $key => $photo)
                <div class="slider-item"><img src="{{ $photo['url_max300'] }}" alt="alt"></div>
            @endforeach
        </div>
        <div class="name-slide-number">
            <div class="number"><span class="current">1</span>/{{count($hotel->photos()) + 1}}</div>
        </div>
    </div>
</div>
