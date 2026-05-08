@extends('module::BlogThemeDemo.View.pc.blog.frame')

@section('pageTitleMain')留言板@endsection
@section('pageKeywords')留言@endsection
@section('pageDescription')欢迎留言@endsection

@section('bodyContent')

    <div class="ub-panel">
        <div class="head">
            <div class="title">留言板</div>
        </div>
        <div class="body">
            <p style="text-align:center;color:#999;margin-bottom:30px;">欢迎在这里给我留言，分享你的想法...</p>

            <form action="{{modstart_api_url('blog/message/add')}}" method="post" data-ajax-form>
                <div class="line">
                    <div class="label">称呼 <span style="color:red;">*</span></div>
                    <div class="field">
                        <input type="text" class="form-control" name="username" placeholder="请输入您的称呼" required />
                    </div>
                </div>
                <div class="line">
                    <div class="label">邮箱</div>
                    <div class="field">
                        <input type="email" class="form-control" name="email" placeholder="请输入您的邮箱（可选）" />
                    </div>
                </div>
                <div class="line">
                    <div class="label">网址</div>
                    <div class="field">
                        <input type="text" class="form-control" name="url" placeholder="请输入您的网址（可选）" />
                    </div>
                </div>
                <div class="line">
                    <div class="label">留言内容 <span style="color:red;">*</span></div>
                    <div class="field">
                        <textarea class="form-control" name="content" rows="5" placeholder="请输入留言内容..." required></textarea>
                    </div>
                </div>
                <div class="line">
                    <div class="label">验证码</div>
                    <div class="field">
                        {!! \Module\Vendor\Provider\Captcha\CaptchaProvider::get(modstart_config('Blog_MessageCaptchaProvider','default'))->render() !!}
                    </div>
                </div>
                <div class="line">
                    <div class="label"></div>
                    <div class="field">
                        <button type="submit" class="btn btn-primary">提交留言</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(isset($records) && !empty($records))
        <div class="ub-panel" style="margin-top:20px;">
            <div class="head">
                <div class="title">留言列表</div>
            </div>
            <div class="body">
                @foreach($records as $record)
                    <div style="padding:15px;border-bottom:1px solid #eee;">
                        <div style="margin-bottom:10px;">
                            <strong>
                                @if(!empty($record['username']))
                                    @if(!empty($record['url']))
                                        <a href="{{$record['url']}}" target="_blank" rel="nofollow">{{$record['username']}}</a>
                                    @else
                                        {{$record['username']}}
                                    @endif
                                @else
                                    匿名
                                @endif
                            </strong>
                            <span style="color:#999;margin-left:10px;">{{$record['created_at']}}</span>
                        </div>
                        <div style="margin-bottom:10px;">
                            {!! nl2br(htmlspecialchars($record['content'])) !!}
                        </div>
                        @if(!empty($record['reply']))
                            <div style="padding:10px;background:#f5f5f5;margin-top:10px;">
                                <div style="color:#999;font-size:12px;margin-bottom:5px;">博主回复：</div>
                                <div>{!! nl2br(htmlspecialchars($record['reply'])) !!}</div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        @if(isset($pageHtml) && !empty($pageHtml))
            <div class="ub-page" style="margin-top:20px;">
                {!! $pageHtml !!}
            </div>
        @endif
    @else
        <div class="ub-panel" style="margin-top:20px;">
            <div class="body">
                <div class="ub-empty">
                    <div>还没有留言，快来抢沙发吧~</div>
                </div>
            </div>
        </div>
    @endif

@endsection