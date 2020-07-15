@extends('layouts.main');

@section('content')
<div class="container">
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{$error}}
    </div>
    @endforeach

@endif

    <h1>Edit Page</h1>
    <!-- Default form register -->
<form class="text-center border border-light p-5" action="{{route('update',$student->id)}}" method="POST">

        {{csrf_field()}}
       

    <p class="h4 mb-4">Add Student</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text"  type="hidden" id="defaultRegisterFormFirstName" class="form-control" value="{{$student->first_name}}" name="firstname" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" type="hidden"  id="defaultRegisterFormLastName" class="form-control" value="{{$student->last_name}}" name="lastname" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" type="hidden" id="defaultRegisterFormEmail" name="email" value="{{$student->email}}" class="form-control mb-4" placeholder="E-mail">

    <!-- Phone number -->
    <input type="text" id="defaultRegisterPhonePassword" type="hidden" class="form-control" value="{{$student->phone}}" placeholder="Phone number"  name="phone" aria-describedby="defaultRegisterFormPhoneHelpBlock">



    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add data</button>

</form>
</div>
<!-- Default form register -->
@endsection