
@extends($_viewFrame)

@section('pageTitleMain')测试列表@endsection

@section('bodyContent')
    <div class="ub-container margin-top">
        <div class="ub-panel">
            <div class="head">
                <div class="title">测试数据</div>
            </div>
            <div class="body">
                <ul>
                    @foreach($records as $r)
                        <li>
                            <a href="{{\Module\Demo\Util\UrlUtil::testShow($r)}}">
                                {{$r['title']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="ub-page">
                    {!! $pageHtml !!}
                </div>
            </div>
        </div>
    </div>
@endsection