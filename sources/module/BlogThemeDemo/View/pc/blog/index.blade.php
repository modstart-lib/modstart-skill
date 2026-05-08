@extends('module::BlogThemeDemo.View.pc.blog.frame')

@section('pageTitle'){{modstart_config('siteName').' - '.modstart_config('siteSlogan')}}@endsection

@section('bodyContent')

    <div class="ub-panel">
        <div class="head">
            <div class="title">文章列表</div>
        </div>
        <div class="body">
            @if(!empty($records))
                <table class="ub-table">
                    <thead>
                        <tr>
                            <th>标题</th>
                            <th width="150">发布时间</th>
                            <th width="100">阅读数</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>
                                    <a href="{{modstart_web_url('blog')}}/{{$record['id']}}">
                                        {{$record['title']}}
                                    </a>
                                    @if(!empty($record['summary']))
                                        <div style="color:#999;font-size:12px;margin-top:5px;">
                                            {{mb_substr(strip_tags($record['summary']), 0, 100, 'UTF-8')}}...
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    {{isset($record['postTime']) ? date('Y-m-d', strtotime($record['postTime'])) : date('Y-m-d', strtotime($record['created_at']))}}
                                </td>
                                <td>
                                    {{isset($record['clickCount']) ? $record['clickCount'] : 0}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="ub-empty">
                    <div>暂无文章</div>
                </div>
            @endif
        </div>
    </div>

    @if(!empty($records))
        <div class="ub-page" style="margin-top:20px;">
            {!! $pageHtml !!}
        </div>
    @endif

@endsection