@extends('users.layouts.app')
<style>

</style>
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
         <h1>users Profiles</h1>
    </div>
        <section class="section dashboard">
            <div class="row" >
                <div class="col-sm-6 col-xl-5 col-lg-6" style="background:#fff;border-radius: 9px;">
                    <div class="modal-body">
                        <form
                                role="form"
                                action="{{route('user.deposit.store')}}"
                                method="post"
                                class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form">
                            @csrf
                            <br>
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Deposit to Game</label>
                            </div>
                            <input type="hidden" name="user_id" id="deposit">
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-12 form-group required'>
                                        <label>Game</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Golden Dragon: M-457-093-344</option>
                                                <option value="2">V Blink: Celia2317</option>
                                                <option value="3">Fire Kirin: Celia2317</option>
                                                <option value="4">Ignite: 1812141</option>

                                            </select>
                                </div>

                            </div>


                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-12 form-group required'>
                                    <label>Amount</label>
                                    <input type="text" name="amount" class="form-control" placeholder="Amount">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="selectbasic1">Deposit Method</label>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="dmethod" id="sc1" value="SweepCoins" required="">
                                        <label class="form-check-label" for="sc1">SweepCoins ($0)</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="dmethod" id="rsc1" value="Wallet Balance">
                                        <label class="form-check-label" for="rsc1">Wallet Balance ($0)  </label>
                                    </div>
                                </div>
                                </div>

                            <button class="btn btn-primary" type="submit">Pay with CashApp</button>
                            <br>
                            <br>
                            <button class="btn btn-warning" type="submit">Deposit</button>


                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
