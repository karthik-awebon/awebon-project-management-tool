@extends('layouts.single')


@section('content')

<div class="container-fluid">
    <div class="container">
        <div class = "row">
            <div class="col-md-3">
            </div>    
            <div class="col-md-6 errortitle">
                Do You Have Not Access Admin Page!
            </div>    
            <div class="col-md-3">
            </div>    
        </div>    
    </div>
</div>

<style>
    .errortitle{
        text-align: center;
        padding: 5%;
        font-size: 25px;
        color: #9C27B0;
        border: 4px solid #9C27B0;
        margin-top: 10%;
        font-weight: 500;
    }
    
</style>

@endsection

