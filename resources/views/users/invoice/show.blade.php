@extends('users.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('user/invoice/show.invoice_details') }}</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Your content goes here -->

                <div class="col-md-12 bg-primary rounded-lg text-center ">
                    <h3 class="">{{ __('user/invoice/show.invoice_information') }}</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">

                            <div class="card-body">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($invoice->service as $invoices)
                                    @php
                                        $total += $invoices->total;
                                    @endphp
                                    <ul class="list-group">

                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.description') }}:</strong>
                                            <span>{{ $invoices->description }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.warehouse') }}:</strong>
                                            <span>{{ $invoices->warehouse }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.quantity_hours') }}:</strong>
                                            <span>{{ $invoices->qty_hrs }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.rate') }}:</strong>
                                            <span>{{ $invoices->rate }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.total') }}:</strong>
                                            <span>{{ $invoices->total }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.cost') }}:</strong>
                                            <span>{{ $invoices->cost }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('user/invoice/show.margin_tax') }}:</strong>
                                            <span>{{ $invoices->margin_tax }}</span>
                                        </li>
                                        <br>

                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">

                            <divclass="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.job_id') }}:</strong>
                                    <span>{{ $invoice->job_id }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.status') }}:</strong>
                                    <span
                                        class="badge bg-{{ $invoice->status === 'unpaid' ? 'danger' : ($invoice->status === 'paid' ? 'success' : 'warning') }}">{{ Str::ucfirst($invoice->status) }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.drive_time') }}:</strong>
                                    <span>{{ $invoice->drive_time }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.labor_time') }}:</strong>
                                    <span>{{ $invoice->labor_time }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.payments_and_deposits_input') }}:</strong>
                                    <span>{{ $invoice->payments_and_deposits_input }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.amount_description') }}:</strong>
                                    <span>{{ $invoice->amount_description }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.amount') }}:</strong>
                                    <span>{{ $invoice->amount }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('user/invoice/show.note_to_customer') }}:</strong>
                                    <span>{{ $invoice->note_to_cust }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="m-4">
                    <button class="btn btn-primary" onclick="goBack()">{{ __('user/invoice/show.go_back') }}</button>
                    <a href="{{ route('invoice.generate', $invoice->id) }}"
                        class="btn btn-warning">{{ __('user/invoice/show.download_pdf') }}</a>

                    @if ($invoice->status != 'paid')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            {{ __('user/invoice/show.pay_now') }}
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Card Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                                            class="require-validation" data-cc-on-file="false"
                                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">

                                            @csrf
                                            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">

                                            <div class='form-row row'>

                                                <div class='col-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label> <input
                                                        class='form-control' size='20' type='text'>
                                                </div>

                                            </div>

                                            <div class='form-row row'>

                                                <div class="col-12 form-group card required">
                                                    <label class="control-label" for="cardNumber">Card Number</label>
                                                    <input autocomplete="off" class="form-control card-number"
                                                        maxlength="19" type="text" id="cardNumber"
                                                        placeholder="1234 5678 9012 3456" inputmode="numeric">
                                                </div>

                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                        class='form-control card-cvc' placeholder='ex. 311' maxlength="3"
                                                        type='number'>
                                                </div>

                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label> <input
                                                        class='form-control card-expiry-month' placeholder='MM'
                                                        maxlength="2" type='number'>
                                                </div>

                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label> <input
                                                        class='form-control card-expiry-year' placeholder='YYYY'
                                                        maxlength='4' type='number'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-md-12 error form-group hide'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                        again.</div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay
                                                        Now
                                                        (${{ $total }})</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.19/jquery.inputmask.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#cardNumber').inputmask('9999 9999 9999 9999'); // Mask for credit card number
        });
        $(function() {

            /*------------------------------------------

            --------------------------------------------

            Stripe Payment Code

            --------------------------------------------

            --------------------------------------------*/

            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {

                var $form = $(".require-validation"),

                    inputSelector = ['input[type=email]', 'input[type=password]',

                        'input[type=text]', 'input[type=file]',

                        'textarea'
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

            /*------------------------------------------

            --------------------------------------------

            Stripe Response Handler

            --------------------------------------------

            --------------------------------------------*/

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
