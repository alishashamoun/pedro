@extends('nonvoting.layouts.app')
<style>

</style>
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
         <h1>Request Account</h1>
    </div>
        <section class="section dashboard">
            <div class="row" >
                <div class="col-sm-6 col-xl-5 col-lg-6" style="background:#fff;border-radius: 9px;">    
                    <div class="modal-body">
                        <form 
                                role="form" 
                                action="{{route('user.request.store')}}" 
                                method="post" >
                            @csrf
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-12 form-group required'>
                                        <label>Select Game</label>
                                        <select class="form-select" aria-label="Default select example" name="game_id">
                                        <option value="">Open this select menu</option>
                                            @foreach ($games as $data)
                                            <option value="{{$data->id}}">
                                                {{$data->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                         
                            <button class="btn btn-primary" type="submit">Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

 

@endsection