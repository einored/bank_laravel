<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class BankController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $accounts = Account::all()->sortByDesc('name');
        // $accounts = Account::where('id', '>', 7)->orderBy('name')->get(); //there id > 1 and sort        
        // dump($accounts);

        $accounts = match($request->sort) {
            'ascId' => Account::orderBy('id', 'asc')->get(),
            'descId' => Account::orderBy('id', 'desc')->get(),
            'ascPersonalCode' => Account::orderBy('personalCode', 'asc')->get(),
            'descPersonalCode' => Account::orderBy('personalCode', 'desc')->get(),
            'ascName' => Account::orderBy('name', 'asc')->get(),
            'descName' => Account::orderBy('name', 'desc')->get(),
            'ascSurname' => Account::orderBy('surname', 'asc')->get(),
            'descSurname' => Account::orderBy('surname', 'desc')->get(),
            'ascAccNumber' => Account::orderBy('accNumber', 'asc')->get(),
            'descAccNumber' => Account::orderBy('accNumber', 'desc')->get(),
            'ascBalance' => Account::orderBy('balance', 'asc')->get(),
            'descBalance' => Account::orderBy('balance', 'desc')->get(),
            default => Account::all()
        };

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
        $account->surname = $request->create_account_surname ?? 'no surname';
        $account->personalCode = $request->create_account_personal_code;
        $account->accNumber = $iban;
        $account->balance = '0';

        $account->save();

        return redirect()->route('accounts-index')->with('success', 'Created new account!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(int $accountId)
    {
        $account = Account::where('id', $accountId)->first();

        return view('account.show', ['account' => $account]);
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

        return redirect()->route('accounts-index')->with('success', 'Cash in success!');
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
            $account->save();

            return redirect()->route('accounts-index')->with('success', 'Cash out success!');
        }   

        return redirect()->route('accounts-index')->with('error', 'Cash out fail!');
       
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

        return redirect()->route('accounts-index')->with('delete', 'Account deleted!');;
    }
}
