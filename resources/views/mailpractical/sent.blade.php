@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menuitem')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Sent') }}</div>

                <div class="card-body">
                    
                    <div class="form-group row">
                        <table id="pagedatatable" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Subject</th>
                              <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sents as $sent)
                                <tr>
                                    <td>{{ $sent->id }}</td>
                                    <td>{{ $sent->subject }}</td>
                                    <td>{{ $sent->message }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
