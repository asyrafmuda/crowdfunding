@extends('layouts.admin')

@section('page-heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> Add New Bank</h2>
            <span>New bank account, for user can make transfer to this bank. </span>
        </div>

        <div class="col-lg-2" style="padding-top: 35px;">

        </div>
    </div>
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">

        <form action="{{ route('admin.bank.store') }}" class="form-horizontal" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile Bank's Account</h5>

                    <div class="ibox-tools">
                        <button type="submit" class="btn btn-sm btn-primary">
                            Save Bank
                        </button>

                        <a href="{{ route('admin.bank.list') }}" class="btn btn-sm btn-danger" style="color: #fff">
                            Cancel
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="form-group form-group-sm {{ $errors->has('bank_account_id') ? 'has-error' : '' }}">
                                <label for="bankAccountID" class="col-lg-2 control-label">Account ID</label>
                                <div class="col-lg-5">
                                    <input type="text"
                                           name="bank_account_id"
                                           id="bankAccountID"
                                           placeholder="ID Number"
                                           value="{{ old('bank_account_id') }}"
                                           class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-group-sm {{ $errors->has('bank_account_name') ? 'has-error' : '' }}">
                                <label for="bankAccountName" class="col-lg-2 control-label">Account Name</label>
                                <div class="col-lg-9">
                                    <input type="text"
                                           name="bank_account_name"
                                           id="bankAccountName"
                                           placeholder="Your name of bank account"
                                           value="{{ old('bank_account_name') }}"
                                           class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-group-sm {{ $errors->has('bank_code') ? 'has-error' : '' }}">
                                <label for="bankCode" class="col-lg-2 control-label">Bank Code</label>
                                <div class="col-lg-2">
                                    <input type="text"
                                           name="bank_code"
                                           id="bankCode"
                                           placeholder="Code"
                                           value="{{ old('bank_code') }}"
                                           class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-group-sm {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                                <label for="bankName" class="col-lg-2 control-label">Bank Name</label>
                                <div class="col-lg-10">
                                    <input type="text"
                                           name="bank_name"
                                           id="bankName"
                                           placeholder="Bank name"
                                           value="{{ old('bank_name') }}"
                                           class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-group-sm {{ $errors->has('bank_short_name') ? 'has-error' : '' }}">
                                <label for="bankShortname" class="col-lg-2 control-label">Short</label>
                                <div class="col-lg-3">
                                    <input type="text"
                                           name="bank_short_name"
                                           id="bankShortname"
                                           placeholder="Short bank name"
                                           value="{{ old('bank_short_name') }}"
                                           class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-group-sm {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
                                <label for="bankBranch" class="col-lg-2 control-label">Bank Branch</label>
                                <div class="col-lg-10">
                                     <textarea name="bank_branch"
                                               placeholder="Bank branch you've registered"
                                               id="bankBranch"
                                               class="form-control"
                                               rows="3">{{ old('bank_branch') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group form-group-sm {{ $errors->has('bank_picture') ? 'has-error' : '' }}">
                                <div class="col-lg-12">
                                    <label for="bankPicture" class="col-lg-12">
                                        <div class="row">Bank Image</div>
                                    </label>
                                    <input type="file"
                                           id="bankPicture"
                                           name="bank_picture"
                                           value="{{ old('bank_picture') }}"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection
