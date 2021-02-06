@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <table border="0" cellpadding="10" cellspacing="0" align="center">
                    <tr>
                        <td align="center"></td>
                    </tr>
                    <tr>
                        <td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup"
                                title="How PayPal Works"
                                onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img
                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0"
                                    alt="PayPal Logo"></a></td>
                    </tr>
                </table>

                <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a>
            </div>
        </div>
    </div>
</div>
@endsection
