@extends('layouts.master_app')

@section('script')

$('#details').click(function(e) {

    $.ajax({
      headers:{'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')},
      url:'api/details',
      type: 'POST',
      dataType:'json',
      success:function(data){
          console.log(data);
          
          
      }
   });
  });

@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="#" id="details">You are logged in! </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
