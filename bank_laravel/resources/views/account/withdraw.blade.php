@extends('main')
@section('title','Cash Out')
@section('content')
<ul>
    <form action="{{route('accounts-withdrawBalance', $account)}}" method="post">
    <li>{{$account->name}} {{$account->surname}}</li>
    <li>{{$account->accNumber}}</li>
    <li>Balance: {{$account->balance}}</li>
    <li>Amount:
        <input type="number" step="0.01" name="create_account_input"></input>
    </li>
    @csrf
    @method('put')
    <button type="submit">Cash Out</button>
    </form>
</ul>
@endsection