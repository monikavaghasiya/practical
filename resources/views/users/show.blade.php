<div style="padding: 10px">
    <h2>User Detail</h2>
    <div>
        <div><b>Email: </b>{{ $user->email }}</div>
        <div><b>About: </b>{{ $user->about }}</div>
    </div>
    @if(count($user->userImages) > 0)
        <div style="margin-bottom: 20px; margin-top: 20px"></div>
        <h2>User Images</h2>
        <div>
            @foreach($user->userImages as $key => $userImage)
                <div style="padding: 10px; width: 20%; float: left;">
                    <img height="100px" src="{{ asset('uploads/users/') . $userImage->image }}">
                </div>
                @if($key%4 == 0)
                    <div style="page-break-inside:auto">&nbsp;</div>
                @endif
            @endforeach
        </div>
    @endif
</div>