<header>
    <div class="header-title" onclick="location.href='{{route('admin_index')}}';" style="cursor: pointer">
        @if($settingsData->logo)
            <img src="{{\Illuminate\Support\Facades\Storage::url($settingsData->logo)}}" style="object-fit: cover; width: 10vw; min-width: 150px">
        @else
            <img src="{{asset('assets')}}/admin/img/logo.png" style="object-fit: cover; height: 5vh">
        @endif
    </div>
    <div class="user-info" id="user-info">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
           data-bs-toggle="dropdown" aria-expanded="false">
            <img class="user-profile " src="{{asset('assets')}}/admin/img/user.png">
            <p class="" style="padding-left: 5px">{{Auth::user()->name}}</p>
        </a>

        <ul class="dropdown-menu">
            <li ><a href="{{route('dashboard')}}" class="float-end"><i class="fa-solid fa-table-columns"></i>Dashboard</a></li>
            <li ><a href="{{route('logoutuser')}}" class="float-end"><i class="fa-solid fa-right-from-bracket ml-4"></i>LogOut</a></li>
        </ul>


    </div>
</header>


