<div class="card" style="width: 18rem;">
    <img src=" {{asset(Auth::user()->image)}} " alt="card-image" style="border-radius:50%" height="100%" width="100%">
    <ul class="list-group list-group-flush">
        <a href=" {{ route('user-dashboard') }} " class="btn btn-primary btn-sm btn-block">Home</a>
        <a href=" {{ route('profile-image') }} " class="btn btn-primary btn-sm btn-block">Update Image</a>
        <a href=" {{ route('user-password') }} " class="btn btn-primary btn-sm btn-block">Update Password</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> Logout </a>
    </ul>
</div>
