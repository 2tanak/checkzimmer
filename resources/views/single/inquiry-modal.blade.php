<div class="modal-overlay inquiry-modal-overlay">
    <div class="inquiry-modal">
        <div class="modal-close">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
            </svg>
        </div>
        <div class="title">{{ __('Send request') }}</div>
        @include('single.inquiry-form', ['id' => $hotel->id])
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        jQuery('.inquiry-modal .modal-close').click(function () {
            jQuery('.modal-overlay').removeClass('modal-show');
            if (jQuery(window).width() <= 680) {
                jQuery('body').removeClass('overflow');
            }
        });

    });
</script>
