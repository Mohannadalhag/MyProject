<a class="nav-item nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
<a class="nav-item nav-link" href="{{url('/about')}}">About</a>
<a class="nav-item nav-link" href="{{url('/services')}}">Services</a>
<a class="nav-item nav-link" href="{{url('/accounts')}}">Accounts</a>
<a class="nav-item nav-link" href="{{url('/essentialoperations')}}">Essential operations</a>
@auth
<a class="nav-item nav-link" href="{{url('/accounts/create')}}">Create Account</a>
<a class="nav-item nav-link" href="{{url('/essentialoperations/create')}}">Create Essential operation</a>
@endauth