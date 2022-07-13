{{-- @extends('main') --}}
@extends('layouts.app')
@section('title', 'Accounts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Account</div>

                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Personal code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Account number</th>
                                <th scope="col">Balance (&euro;)</th>
                                <th scope="col">Cash In</th>
                                <th scope="col">Cash out</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$account->id}}</td>
                            <td>{{$account->personalCode}}</td>
                            <td>{{$account->name}}</td>
                            <td>{{$account->surname}}</td>
                            <td>{{$account->accNumber}}</td>
                            <td>{{$account->balance}}</td>

                            <td><a class="btn btn-success btn-sm" href="{{route('accounts-add', $account)}}">Add</a></td>
                            <td><a class="btn btn-danger btn-sm" href="{{route('accounts-withdraw', $account)}}">Withdraw</a></td>
                            <td>
                                <form class="delete" action="{{route('accounts-delete', $account)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-warning btn-sm">Delete</button>
                                </form>
                            </td>
                            <td><a class="btn btn-outline-info btn-sm" href="{{route('accounts-show', $account->id)}}">Show</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
