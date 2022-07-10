    
@extends('main')
@section('title', 'Accounts')
@section('content')
<a class="add-account" href="{{route('accounts-create')}}">Add account</a>
<table class="account-table">
    <tr>
        <th>ID</th>
        <th>Personal code</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Account number</th>
        <th>Balance (&euro;)</th>
        <th>Cash In</th>
        <th>Cash out</th>
        <th>Delete</th>
    </tr>
    @forelse($accounts as $account)
    <tr>
        <td>{{$account->id}}</td>
        <td>{{$account->personalCode}}</td>
        <td>{{$account->name}}</td>
        <td>{{$account->surname}}</td>
        <td>{{$account->accNumber}}</td>
        <td>{{$account->balance}}</td>
    
    <td><a href="{{route('accounts-add', $account)}}">|Add|</a></td>
    <td><a href="{{route('accounts-withdraw', $account)}}">|Withdraw|</a></td>
    <td>
        <form class="delete" action="{{route('accounts-delete', $account)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </td>
    </tr>

    @empty
    <li>No accounts, no life.</li>
@endforelse
</table>
@endsection