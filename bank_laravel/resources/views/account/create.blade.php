{{-- @extends('main') --}}
@extends('layouts.app')

@section('title', 'Create account')
@section('content')
<ul>
    <form action="{{route('accounts-store')}}" method="post">
    <li>Name</li><input type="account" name="create_account_name" />
    <li>Surname</li><input type="account" name="create_account_surname" />
    <li>Personal code</li><input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11"  name="create_account_personal_code" />
    @csrf
    <button type="submit">Add account</button>
    </form>
</ul>
@endsection