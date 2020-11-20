@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menuitem')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" id="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>view</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    var doctordatatable = $('#table').DataTable({
      responsive: true,
      "processing": true,
      "ajax": "{{ route('user.array') }}",
      "language": {
        "emptyTable": "No user Available"
      },
      "order": [[0, "desc"]],
    });
    doctordatatable.columns([0]).visible(false, false);
  });
</script>

<script>
    $(document).ready(function(){
        $('body').on('click', '.viewmore', function(e) {
            var modelData = JSON.parse(atob($(this).data('detail')));
            console.log(modelData);
            e.preventDefault();
            dic = "<div>";
            dic += "<div>ID : "+modelData.id+"</div>";
            dic += "<div>Name : "+modelData.name+"</div>";
            dic += "<div>Email : "+modelData.email+"</div>";
            dic += "</div>";
            $(".userdetail").html(dic);
        });
    });
</script>
@endsection


