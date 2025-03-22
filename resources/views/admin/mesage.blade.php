@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4>Error</h4> {{ session::get('error') }}
  </div>
@endif

@if(session::get('success'))
    
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4>success</h4>{{session::get('success')}}
  </div>
@endif  
