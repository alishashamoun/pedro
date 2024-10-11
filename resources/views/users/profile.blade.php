@extends('users.layouts.app')
<style>

</style>
@section('content')
 {{-- intl Tel Input CSS --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
 <style>
    .iti.iti--allow-dropdown {
    width: 100% !important;
}
 </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('user/profile/index.edit_profile') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('user/profile/index.edit_profile') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <main id="main" class="main">

            <section class="section dashboard">
                <div class="row">

                    <div class="col-xl-12" style="background:#fff">
                        <div class="card">
                            <div class="card-header">

                                <div class="card-body">
                                    <form action="{{ route('users.edit.profile') }}" method="post" autocomplete="false" id="order-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>{{ __('user/profile/index.name') }}:</strong>
                                                    <input class="form-control" value="{{ Auth::user()->name }}"
                                                        name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>{{ __('user/profile/index.email') }}:</strong>
                                                    <input class="form-control" readonly value="{{ Auth::user()->email }}"
                                                        type="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    {{-- <strong>Phone:</strong> --}}
                                                    <input type="tel" name="Phone" id="phone"
                                                        class="form-control w-100"
                                                        placeholder="Phone" value="{{ Auth::user()->phone }}"
                                                        oninput="this.value=this.value.replace(/[^0-9\+]/g,'');"
                                                        autocomplete="off" data-intl-tel-input-id="0">
                                                    <input type="hidden" name="phone" id="phone2" />
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


            </section>
    </div>
    </main>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.3/autoNumeric.min.js"
        integrity="sha512-CVmI6jvZ64JTUP54b893musu1a1R7e9qxdtYFkIw/JCSm4FW4z3sgg+phx+dZD1qSYXrr5EFWRdS8qetwbhgBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Include intlTelInput library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>

    <script>
         const phoneInputField = document.querySelector("#phone");
        // console.log(phoneInputField);
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["US"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        // console.log(phoneInput);
        $("#order-form").submit(function() {
            $('#order-form').find(':submit').attr("disabled", true);
            // $('#btn-submit').html("Submitting...");
            const phoneNumber = phoneInput.getNumber();
            console.log(phoneNumber);
            $('#phone2').val(phoneNumber);
            return true;
        });
    </script>

    {{-- <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                        'input[type=file]', 'textarea'
                    ].join(', '),
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
    </script> --}}
@endsection
