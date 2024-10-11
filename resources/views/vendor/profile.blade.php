@extends('nonvoting.layouts.app')
<style>

</style>
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
         <h1>User Profile</h1>
    </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-xl-4" style="background:#fff">
                    <div class="card">
                            <div class="card-header">
                            <h4 class="">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.profile.update')}}" method="post" autocomplete="false">
                                @csrf
                                    <div class="row mb-2">
                                        <div class="profile-title">
                                            <div class="media"> <img class="img-100 " alt="" src="./uploads/profile/63d9dcdd43bc463d9dcdd43bc6.png">
                                                <div class="media-body">
                                                    <h5 class="mb-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}} </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" placeholder="First Name" data-bs-original-title="" name="first_name" value="{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : ''}}" title="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" placeholder="Last Name" data-bs-original-title="" name="last_name" value="{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : ''}}" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" title="" value="{{ isset(Auth::user()->email) ? Auth::user()->email : ''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" autocomplete="off" type="password" name="password" title="" required="">
                                    </div>
                                    <br>
                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block w-100" data-bs-original-title="" name="save" title="">Update</button>
                                    </div>
                                </form>
                            </div>
                    </div>

                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="col-xl-4" style="background:#fff">
                    <div class="card">
                            <div class="card-header">
                            <h4 class="">Edit Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.edit.profile')}}" method="post" autocomplete="false">
                                @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Paypal Email</label>
                                        <input class="form-control" placeholder="your-email@domain.com" data-bs-original-title="" name="paypal_email" title="" value="{{ isset(Auth::user()->paypal_email) ? Auth::user()->paypal_email : ''}}">
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label class="form-label">Venmo Number</label>
                                        <input class="form-control"  data-bs-original-title="" name="venmo_number" title="" value="{{ isset(Auth::user()->venmo_number) ? Auth::user()->venmo_number : ''}}">
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label class="form-label">Connect to Facebook</label>
                                        <input class="form-control" placeholder="FB ID" data-bs-original-title="" name="connect_to_facebook" title="" value="{{ isset(Auth::user()->connect_to_facebook) ? Auth::user()->connect_to_facebook : ''}}">
                                    </div>
                                    <br>
                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block w-100" data-bs-original-title="" name="save" title="">Update</button>
                                    </div>
                                </form>

                            </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-xl-4" style="background:#fff">
                    <div class="card">
                            <div class="card-header">
                            <h4 class="">Bank Details</h4>
                            <h6 style="color:crimson">*Please note the bank account has to be in your name or the cashout will fail. RC Amusement LLC will not be responsible for any mistakes you made during the cashout process.</h6>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.bank.detail')}}" method="post" autocomplete="false">
                                  @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Account Number</label>
                                        <input class="form-control" placeholder="xxxxxxxxxxxxxxx" data-bs-original-title="" name="account_number" title="" value="{{ isset(Auth::user()->account_number) ? Auth::user()->account_number : ''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Routing Number<span style="color:crimson">*Must be 9 digits</span></label>
                                        <input class="form-control" type="text" name="route_number" title="" value="{{ isset(Auth::user()->rout_number) ? Auth::user()->rout_number : ''}}">
                                    </div>
                                    <br>
                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block w-100" data-bs-original-title="" name="save" title="">Update</button>
                                    </div>
                                </form>
                            </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</main>




<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>
@endsection
