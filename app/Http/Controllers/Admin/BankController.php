<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{

    /**
     * Bank Model
     *
     * @var mixed
     */
    private $bank;

    private $code;

    private $name;

    private $short;

    private $branch;

    private $account_number;

    private $account_name;

    private $picture;


    public function __construct()
    {
        $this->middleware('auth:admin');

        // Init bank model.
        $this->setBank(new Bank());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = $this->bank->all();

        return view('admin.bank.index')
            ->withBanks($banks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validator($request);

        // Binding the request to variables
        $this->bindRequest($request);

        // Upload the image
        if($request->hasFile('bank_picture')) {

            $file = $request->file('bank_picture');

            /* Storing images to disk */
            $filename = $file->storePublicly('images/banks' , 'public');

            /* Storing image path to the database */
            $this->setPicture($filename);
        }

        // Storing data to database.
        $this->saveData();

        // Flashing success massage
        $request->session()->flash('success', 'You\'ve success added new bank account.');

        // Success return to view with message.
        return redirect()
            ->route('admin.bank.add')
            ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param  int $code
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $code)
    {
        $bank = $this->bank->find($id);

        if ($code != $bank->bank_code)
        {
            abort('404');
        }

        return view('admin.bank._form-edit')
            ->withBank($bank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation data
        $this->validator($request);

        // Bind the request data
        $this->bindRequest($request);

        // Update the data
        $bank = $this->setUpdate($request, $id);

        // Flashing massage
        $request->session()->flash('success', 'You\'ve success update bank profile');

        // If success redirect to the
        return redirect()->route('admin.bank.edit', [$bank->id, $bank->bank_code]);
    }

    private function setUpdate($request, $id)
    {
        $bank = $this->bank->find($id);

        // Upload the image
        if($request->hasFile('bank_picture')) {

            Storage::delete($bank->picture);

            $file = $request->file('bank_picture');

            /* Storing images to disk */
            $filename = $file->storePublicly('images/banks' , 'public');

            /* Storing image path to the database */
            $bank->picture = $filename;
        }

        $bank->bank_code = $this->getCode();
        $bank->bank_name= $this->getName();
        $bank->short_name = $this->getShort();
        $bank->branch = $this->getBranch();
        $bank->account_number = $this->getAccountNumber();
        $bank->account_name = $this->getAccountName();

        $bank->save();

        return $bank;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Set the bank model
     *
     * @param Bank $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }


    /**
     * Bind the request to the variabels.
     *
     * @param $request
     */
    private function bindRequest($request)
    {
        // Init variables
        $this->setCode($request->bank_code);
        $this->setName($request->bank_name);
        $this->setShort($request->bank_short_name);
        $this->setBranch($request->bank_branch);
        $this->setPicture($request->bank_picture);
        $this->setAccountName($request->bank_account_name);
        $this->setAccountNumber($request->bank_account_id);
    }

    /**
     * Save all data to the database
     *
     * @return mixed
     */
    private function saveData()
    {
        return $this->bank->create([
            'bank_code' => $this->getCode(),
            'bank_name'=> $this->getName(),
            'short_name' => $this->getShort(),
            'branch' => $this->getBranch(),
            'account_number' => $this->getAccountNumber(),
            'account_name' => $this->getAccountName(),
            'picture' => $this->getPicture()
        ]);
    }

    /**
     * This is validator for the bank form
     *
     * @param $request
     */
    private function validator($request)
    {
        $this->validate($request, [
            'bank_code' => 'required',
            'bank_name' => 'required',
            'bank_short_name' => 'required',
            'bank_branch' => 'required',
            'bank_picture' => 'image',
            'bank_account_name' => 'required',
            'bank_account_id' => 'required'
        ]);
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * @param mixed $short
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * @param mixed $account_number
     */
    public function setAccountNumber($account_number)
    {
        $this->account_number = $account_number;
    }

    /**
     * @return mixed
     */
    public function getAccountName()
    {
        return $this->account_name;
    }

    /**
     * @param mixed $account_name
     */
    public function setAccountName($account_name)
    {
        $this->account_name = $account_name;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
}
