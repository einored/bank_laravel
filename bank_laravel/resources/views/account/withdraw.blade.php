{{-- @extends('main') --}}
@extends('layouts.app')
@section('title', 'Cash out')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Withdraw money from account</div>

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
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$account->id}}</td>
                            <td>{{$account->personalCode}}</td>
                            <td>{{$account->name}}</td>
                            <td>{{$account->surname}}</td>
                            <td>{{$account->accNumber}}</td>
                            <td>{{$account->balance}}</td>
                        </tr>
                    </table>
                    
                    <ul>
                        <form action="{{route('accounts-withdrawBalance', $account)}}" method="post">
                            
                            <input type="number" step="0.01" class="form-control" placeholder="Amount to withdraw" name="create_account_input" />
                            
                            @csrf
                            @method('put')
                            <button type="submit" class="button-top-margin btn btn-danger btn-sm btn-block">Cash Out</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
