  <section class="registration-section data-checking-section">
      <div class="logo-block" style="text-align:center; margin-bottom:40px;">
          <img src="https://check-zimmer.de/img/logo.png" alt="" style="width:35%;">
      </div>
      <div class="billing-address-container">
          <div class="main-registration-content" style="font-family:'Open Sans', 'Arial', sans-serif; ">
              @include('email.registration.user', ['data' => $data])

          </div>
      </div>

  </section>