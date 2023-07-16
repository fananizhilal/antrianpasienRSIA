@extends('dashboard.layout')

@section('content')


<div class="row justify-content-center mt-5">
    <div class="col-md-8">
       <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between"> 
                <span>Dashboard Admin</span>
                <ul class="list-unstyled m-0">
                    <li><a class="nav-link scrollto" href="home">Home</a></li>
                </ul>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif                
            </div>
        </div>
    </div>    
</div>
    
@endsection