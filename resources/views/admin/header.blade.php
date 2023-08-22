<header>
    <div class="header-title" onclick="location.href='{{route('admin_index')}}';" style="cursor: pointer">
        @if($settingsData->logo)
            <img src="{{\Illuminate\Support\Facades\Storage::url($settingsData->logo)}}" style="object-fit: cover; max-height: 60px">
        @else
            <img src="{{asset('assets')}}/admin/img/logo.png" style="object-fit: cover; width: 10vw; max-height: 70px">
        @endif
    </div>
    <div class="user-info" id="user-info">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
           data-bs-toggle="dropdown" aria-expanded="false">
            <span class="user-profile">{{Auth::user()->name[0]}}</span>
            <p class="" style="padding-left: 5px; font-size: 1.6rem">{{Auth::user()->name}}</p>
        </a>


        <ul class="dropdown-menu">
            <li class="dropdown-menu_profile_name"><a href="{{route('admin_profile_index')}}" class="float-end " style="font-size: 1.3rem!important;">{{Auth::user()->name}}</a></li>
            <li ><a href="{{route('dashboard')}}" class="float-end"><i class="fa-solid fa-table-columns"></i>Dashboard</a></li>
            <li ><a href="{{route('logoutuser')}}" class="float-end"><i class="fa-solid fa-right-from-bracket ml-4"></i>LogOut</a></li>
        </ul>

    </div>
</header>

