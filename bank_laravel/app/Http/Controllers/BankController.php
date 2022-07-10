<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class BankController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        
        return view('account.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    // public function getIBAN()
    // {
    //     $iban = 'LT';
    //     $iban .= (string)rand(0, 9);
    //     $iban .= (string)rand(0, 9);
    //     $iban .= '12121';
    //     for ($i = 0; $i < 11; $i++)
    //         $iban .= (string)rand(0, 9);
    //     return $iban;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iban = 'LT';
        $iban .= (string)rand(0, 9);
        $iban .= (string)rand(0, 9);
        $iban .= '12121';
        for ($i = 0; $i < 11; $i++)
            $iban .= (string)rand(0, 9);

        $account = new Account;

        $account->name = $request->create_account_name;
        $account->surname = $request->create_account_surname;
        $account->personalCode = $request->create_account_personal_code;
        $account->accNumber = $iban;
        $account->balance = '0';

        $account->save();

        return redirect()->route('accounts-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function add(Account $account)
    {
        
        return view('account.add', ['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function withdraw(Account $account)
    {
        
        return view('account.withdraw', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->balance = $request->create_account_input;

        $account->save();

        return redirect()->route('accounts-index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function addBalance(Request $request, Account $account)
    {
        $input = $request->create_account_input;
        if($input > 0){
            $account->balance += $request->create_account_input;
        }            

        $account->save();

        return redirect()->route('accounts-index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function withdrawBalance(Request $request, Account $account)
    {
        $input = $request->create_account_input;
        if($input > 0 && $account->balance-$input >= 0){
            $account->balance -= $request->create_account_input;
        }   

        $account->save();

        return redirect()->route('accounts-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts-index');
    }
}
