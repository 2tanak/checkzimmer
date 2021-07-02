    <section class="registration-section data-checking-section">
        <div class="billing-address-container">
            <div class="main-registration-content">
                @include('email.registration.account', ['data' => $data])
                @include('email.registration.contact', ['data' => $data])
                @include('email.registration.property-data', ['data' => $data])
                @include('email.registration.photos', ['data' => $data])



            </div>
        </div>
    </section>
