@extends('module::BlogThemeDemo.View.pc.blog.frame')

@section('pageTitleMain'){{$record['title']}}@endsection
@section('pageKeywords'){{$record['seoKeywords']}}@endsection
@section('pageDescription'){{$record['seoDescription']}}@endsection

@section('bodyContent')

    <div class="ub-panel">
        <div class="head">
            <div class="title">{{$record['title']}}</div>
        </div>
        <div class="body">
            <div style="color:#999;margin-bottom:20px;">
                发布时间：{{isset($record['postTime']) ? $record['postTime'] : $record['created_at']}}
                &nbsp;|&nbsp;
                阅读数：{{isset($record['clickCount']) ? $record['clickCount'] : 0}}
            </div>

            @if(!empty($record['summary']))
                <div style="padding:15px;background:#f5f5f5;margin-bottom:20px;">
                    {!! \ModStart\Core\Util\HtmlUtil::text2html($record['summary']) !!}
                </div>
            @endif

            @if(!empty($record['images']))
                <div style="margin-bottom:20px;">
                    @foreach($record['images'] as $image)
                        <div style="margin-bottom:10px;">
                            <img src="{{\ModStart\Core\Assets\AssetsUtil::fix($image)}}" alt="{{$record['title']}}" style="max-width:100%;" />
                        </div>
                    @endforeach
                </div>
            @endif

            @if(!empty($record['content']))
                <div class="ub-html">
                    {!! $record['content'] !!}
                </div>
            @endif

            <div style="margin-top:30px;padding-top:20px;border-top:1px solid #eee;">
                @if(isset($recordPrev) && $recordPrev)
                    <div style="margin-bottom:10px;">
                        上一篇：<a href="{{modstart_web_url('blog')}}/{{$recordPrev['id']}}">{{$recordPrev['title']}}</a>
                    </div>
                @endif
                @if(isset($recordNext) && $recordNext)
                    <div>
                        下一篇：<a href="{{modstart_web_url('blog')}}/{{$recordNext['id']}}">{{$recordNext['title']}}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection