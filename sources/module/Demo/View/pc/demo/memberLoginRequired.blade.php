@extends($_viewFrame)

@section('pageTitleMain')已登录界面@endsection

@section('bodyContent')
    <div class="ub-container margin-top">
        <div>
            用户需要登录才能看到的界面
        </div>
        <div>
            @if(modstart_module_enabled('Member'))
                <p>ID：{{$_memberUser['id']}}</p>
                <p>前端通用显示：{{\Module\Member\Util\MemberUtil::viewName($_memberUser)}}</p>
                <p>用户名：{{$_memberUser['username']}}</p>
                <p>昵称：{{$_memberUser['nickname']}}</p>
            @endif
        </div>
    </div>
@endsection