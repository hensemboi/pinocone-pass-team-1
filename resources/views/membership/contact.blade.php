@extends('membership.layouts')
@section('title')
    Pinocone | Contact Page
@endsection
@section('extra-heads')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="p-5 shadow rounded content">
            <h2 class="section-title">Got Any Questions</h2>
            <form method="POST" action="/post/pinocone/contact-us">
                @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="Your First Name">
                  @if ($errors->has('fname'))
                  <span class="text-danger">{{ $errors->first('fname') }}</span>
              @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Your Last Name">
                  @if ($errors->has('lname'))
                  <span class="text-danger">{{ $errors->first('lname') }}</span>
              @endif
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
              </div>
              <div class="form-group">
                <label for="reason">Reason of Contact</label>
                <select id="reason" class="form-control custom-select" name="reason" >
                  <option selected disabled>Choose Your Reason</option>
                  <option value="business">Business</option>
                  <option value="ticket">Ticket</option>
                  <option value="project">Project</option>
                </select>
                @if ($errors->has('reason'))
                <span class="text-danger">{{ $errors->first('reason') }}</span>
            @endif
              </div>
              <div class="form-group">
                <label for="message">Start Writing From Here</label>
                <textarea name="message" id="message" class="form-control" placeholder="Your Text here ..."></textarea>
                @if ($errors->has('message'))
                <span class="text-danger">{{ $errors->first('message') }}</span>
            @endif
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section

@endsection

@section('extra-scripts')
<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

</script>
@endsection
