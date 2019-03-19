@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Transaction Keys</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                   <div class="tbl-header">
                     <table cellpadding="0" cellspacing="0" border="0">
                       <thead>
                         <tr>
                           <th>ID</th>
                           <th>Key</th>
                           <th>Created</th>
                         </tr>
                       </thead>
                     </table>
                   </div>
                    <div class="tbl-content">
                      <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                          @foreach ($transactions as $transaction)
                          <tr>
                            <td>{{$transaction['id']}}</td>
                            <td><a href="/transaction/{{$transaction['transaction_key']}}">{{$transaction['transaction_key']}}</a></td>
                            <td>{{$transaction['created_at']}}</td>
                          </tr>
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
