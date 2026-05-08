@extends($_viewFrame)

@section('pageTitleMain'){{$record['title']}}@endsection
@section('pageKeywords'){{$record['title']}}@endsection
@section('pageDescription'){{$record['title']}}@endsection

@section('bodyContent')
    <div class="ub-container margin-top">
        <div class="ub-breadcrumb">
            <a href="{{\Module\Demo\Util\UrlUtil::test()}}">Demo</a>
            <a href="javascript:;" class="active">{{$record['title']}}</a>
        </div>
        <div class="ub-panel">
            <div class="head">
                <div class="title">{{$record['title']}}</div>
            </div>
            <div class="body">
                @foreach($record as $k=>$v)
                    <pre>{{$k}}:{{$v}}</pre>
                @endforeach
            </div>
        </div>
    </div>
@endsection