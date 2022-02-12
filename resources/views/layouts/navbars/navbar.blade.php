@if(session('role') == "admin")
    @include('layouts.navbars.navs.admin')
@elseif(session('role') == "agent")
    @include('layouts.navbars.navs.agent')
@endif
