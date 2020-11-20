@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menuitem')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Inbox') }}</div>

                <div class="card-body">
                    
                    <div class="form-group row">
                        <table id="pagedatatable" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Subject</th>
                              <th>Message</th>
                              <th>Read</th>
                              <th>Reply</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($inboxs as $inbox)
                                <tr>
                                    <td>{{ $inbox->id }}</td>
                                    <td>{{ $inbox->subject }}</td>
                                    <td>{{ $inbox->message }}</td>
                                    @if($inbox->read == 0)
                                    <td><a href="#" class="read" id="{{ $inbox->id }}"  data_id="{{ $inbox->id }}">UnRead</a></td>
                                    @else
                                    <td><a href="#" class="read" id="{{ $inbox->id }}" data_id="{{ $inbox->id }}">Read</a></td>
                                    @endif
                                    <td><a href="{{ route('compose.edit', $inbox->id) }}">Reply</a></td>
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
<script>
         $(document).ready(function(){
            $('.read').click(function(e){
                var id = $(this).attr('data_id');
                
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                  url: "{{ url('/inbox/readorunread') }}",
                  method: 'get',
                  data: {
                     id: id
                  },
                  success: function(result){
                     var dataid = result;
                     if(dataid == 0){
                        $('#'+id).html('unread');
                     }else{
                        $('#'+id).html('read');
                     }
                  }});
               });
            });
</script>
@endsection
