{{-- @extends('main') --}}
@extends('layouts.app')
@section('title', 'Accounts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Account list</div>
                
                <div class="card-body">
                    @include('msg.main')
                    <a href="{{route('accounts-index')}}">Reset sort</a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID
                                    <a href="{{route('accounts-index', ['sort' => 'ascId'])}}">&#8679;</a>
                                    <a href="{{route('accounts-index', ['sort' => 'descId'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Personal code
                                    <a href="{{route('accounts-index', ['sort' => 'ascPersonalCode'])}}">&#8679;</a>
                                    <a href="{{route('accounts-index', ['sort' => 'descPersonalCode'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Name
                                    <a href="{{route('accounts-index', ['sort' => 'ascName'])}}">&#8679;</a>
                                    <a href="{{route('accounts-index', ['sort' => 'descName'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Surname
                                    <a href="{{route('accounts-index', ['sort' => 'ascSurname'])}}">&#8679;</a>
                                    <a href="{{route('accounts-index', ['sort' => 'descSurname'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Account number
                                    <a href="{{route('accounts-index', ['sort' => 'ascAccNumber'])}}">&#8679;</a>
                                    <a href="{{route('accounts-index', ['sort' => 'descAccNumber'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Balance (&euro;)
                                    <a href="{{route('accounts-index', ['sort' => 'ascBalance'])}}">&#8679;</a>
                                    <a href="{{route('accounts-index', ['sort' => 'descBalance'])}}">&#8681;</a>
                                </th>
@if(Auth::user()->role > 9)
                                <th scope="col">Cash In</th>
                                <th scope="col">Cash out</th>
                                <th scope="col">Delete</th>
@endif
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        @forelse($accounts as $account)
                        <tr>
                            <td>{{$account->id}}</td>
                            <td>{{$account->personalCode}}</td>
                            <td>{{$account->name}}</td>
                            <td>{{$account->surname}}</td>
                            <td>{{$account->accNumber}}</td>
                            <td>{{$account->balance}}</td>
@if(Auth::user()->role > 9)
                            <td><a class="btn btn-success btn-sm" href="{{route('accounts-add', $account)}}">Add</a></td>
                            <td><a class="btn btn-danger btn-sm" href="{{route('accounts-withdraw', $account)}}">Withdraw</a></td>
                            <td>
                                <form class="delete" action="{{route('accounts-delete', $account)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-warning btn-sm">Delete</button>
                                </form>
                            </td>
@endif
                            <td><a class="btn btn-outline-info btn-sm" href="{{route('accounts-show', $account->id)}}">Show</a></td>
                        </tr>

                        @empty
                        <li>No accounts, no life.</li>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
