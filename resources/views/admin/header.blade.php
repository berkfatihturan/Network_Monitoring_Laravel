<header>
    <div class="header-title" onclick="location.href='{{route('admin_index')}}';" style="cursor: pointer"><img src="{{asset('assets')}}/admin/img/logo.png" style="object-fit: cover; height: 5vh"></div>
    <div class="user-info ">
        <img class="user-profile float-end"  src="{{asset('assets')}}/admin/img/user.png" >
        <p class="float-end" style="">{{Auth::user()->name}}</p>
        <a href="{{route('logoutuser')}}" class="float-end"><i class="fa-solid fa-right-from-bracket"></i></a>

    </div>
</header>


