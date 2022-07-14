{{-- @extends('main')
@extends('layouts.app')

@section('title', 'Create account')
@section('content')
<ul>
    <form action="{{route('accounts-store')}}" method="post">
<li>Name</li><input type="account" name="create_account_name" />
<li>Surname</li><input type="account" name="create_account_surname" />
<li>Personal code</li><input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11" name="create_account_personal_code" />
@csrf
<button type="submit">Add account</button>
</form>
</ul>
@endsection --}}

{{-- @extends('main') --}}
@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Create account</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('accounts-store')}}" method="post">
                            <li>Name</li><input type="account" class="form-control" name="create_account_name" />
                            <li>Surname</li><input type="account" class="form-control" name="create_account_surname" />
                            <li>Personal code</li><input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11" name="create_account_personal_code" />
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" >Create</button>
                        </form>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
