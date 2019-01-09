
@extends('layouts.master')

@section('section')
Welcome {{ Auth::user()->name }}
@endsection

@section('content')
@if(Auth::user()->admin == 2)
<!--grid-->
    <div class="grid-form">
        <div class="grid-form1">
            <h3 class="text-center">User Activities</h3>
            <div class="row">
                @foreach($user as $user)
                <div class="col-md-4" style="margin-top:35px"> 
                    <div class="">
                        <div class="col-md-12 top-content">
                            <h5>{{ $user->name }}</h5>
                            <p>Number Of Creditor Record Added</p>
                            <label>
                                {{ $creditor->where('user_id', $user->id)->count() }}
                            </label>
                            <p>Number Of Company Record Added</p>
                            <label> {{ $company->where('user_id', $user->id)->count() }} </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<!--//grid-->
<div class="grid-form">
        <div class="grid-form1">
            <h3 class="text-center">Activities</h3>
            <div class="row">
                <div class="col-md-6" style="margin-top:35px"> 
                    <div class="">
                        <div class="col-md-12 top-content text-center">
                            <p>Total Number Of Creditor Record Added</p>
                            <label>
                                {{ $creditor->count() }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:35px"> 
                    <div class="">
                        <div class="col-md-12 top-content text-center">
                            <p>Total Number Of Company Record Added</p>
                            <label>
                                {{ $company->count() }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else
<!--grid-->
    <div class="grid-form">
        <div class="grid-form1">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="margin-top:35px"> 
                    <div class="">
                        <div class="col-md-12 top-content">
                            <h5>{{ Auth::user()->name }}</h5>
                            <p>Total Number Of Creditor Record Added</p>
                            <label>
                                {{ $creditor->where('user_id', Auth::user()->id)->count() }}
                            </label>
                            <p>Total Number Of Company Record Added</p>
                            <label> {{ $company->where('user_id', Auth::user()->id)->count() }} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--//grid-->
@endif
@endsection

