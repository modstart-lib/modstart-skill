@extends('modstart::layout.frame')

@section('pageFavIco'){{\ModStart\Core\Assets\AssetsUtil::fix(modstart_config('siteFavIco'))}}@endsection
@section('pageTitle')@yield('pageTitleMain','') | {{modstart_config('siteName')}}@endsection
@section('pageKeywords'){{modstart_config('siteKeywords')}}@endsection
@section('pageDescription'){{modstart_config('siteDescription')}}@endsection

@section('headAppend')
    @parent
    {!! \ModStart\Core\Hook\ModStartHook::fireInView('PageHeadAppend'); !!}
@endsection

@section('bodyAppend')
    @parent
    {!! \ModStart\Core\Hook\ModStartHook::fireInView('PageBodyAppend'); !!}
@endsection

@section('body')

    <div style="background:#f5f5f5;padding:40px 0;text-align:center;border-bottom:1px solid #ddd;">
        <div class="container">
            <h1 style="margin:0 0 10px 0;">
                <a href="{{modstart_web_url('')}}" style="color:#333;text-decoration:none;">
                    {{modstart_config('siteName','[博客名称]')}}
                </a>
            </h1>
            <p style="color:#999;margin:0 0 20px 0;">{{modstart_config('siteSlogan','[博客标语]')}}</p>
            <nav>
                <a href="{{modstart_web_url('')}}" style="margin:0 10px;">首页</a>
                <a href="{{modstart_web_url('blog')}}" style="margin:0 10px;">文章</a>
                <a href="{{modstart_web_url('blog/message')}}" style="margin:0 10px;">留言</a>
                @if(modstart_config('Site_ContactEmail'))
                    <a href="mailto:{{modstart_config('Site_ContactEmail')}}" style="margin:0 10px;">联系</a>
                @endif
            </nav>
        </div>
    </div>

    <div id="body" style="padding:40px 0;">
        <div class="container">
            @section('bodyContent')
            @show
        </div>
    </div>

    <footer style="background:#333;color:#999;padding:30px 0;text-align:center;">
        <div class="container">
            @if(modstart_config('siteBeian'))
                <a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow" style="color:#999;">{{modstart_config('siteBeian')}}</a>
                <span style="margin:0 10px;">|</span>
            @endif
            &copy; {{date('Y')}} {{modstart_config('siteName')}}
        </div>
    </footer>

@endsection