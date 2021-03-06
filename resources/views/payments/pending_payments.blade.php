@extends('layouts.main1')
@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl">
   <div class="container-fluid py-1 px-3">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Payments</li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pending Payments</li>
        </ol>
    </nav>
   </div>
</nav>
<div class="card">
    <div class="m-3">
    @if(session('success'))
        <div class="alert alert-success text-white" style="max-width: 350px;">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-white" style="max-width: 350px;">
            {{session('error')}}
        </div>
    @endif
    </div>
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('invoice_no')}}</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Due Date</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Date</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Proof</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($payments as $payments)
        <tr>
            <td>
            <p class="text-xs font-weight-bold mb-0 text-center">{{$payments->id}}</p>
            </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <p class="text-xs text-secondary mb-0">{{$payments->invoice}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <p class="text-xs text-secondary mb-0">{{$payments->amount}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <p class="text-xs text-secondary mb-0">{{$payments->due_Date}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <p class="text-xs text-secondary mb-0">{{$payments->payment_date}}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div class="d-flex flex-column justify-content-center">
                <p class="text-xs text-secondary mb-0">{{$payments->proof}}</p>
              </div>
            </div>
          </td>
          <td class="align-middle text-center">
             <span class="badge badge-sm {{$payments->status == 0 ? 'badge-secondary' : 'badge-success'}}">{{$payments->status == 0 ? 'Pending Approval' : 'Approved'}}</span>
          </td>
          <td class="align-middle text-center">
             <a href="{{route('payments.is_approved',$payments->id)}}" class="btn btn-primary btn-sm mt-3">Approve</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection