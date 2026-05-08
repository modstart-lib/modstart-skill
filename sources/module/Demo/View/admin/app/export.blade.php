@extends('modstart::admin.frame')

@section($_tabSectionName)

    <div class="ub-panel">
        <div class="head">
            <div class="title">{{$pageTitle}}</div>
        </div>
        <div class="body">
            <div class="ub-form">
                <div class="line">
                    <div class="label">操作</div>
                    <div class="field">
                        <a class="btn btn-primary" href="{{modstart_web_url('admin/demo/app_export/export')}}" target="_blank">
                            <i class="iconfont icon-download"></i> 导出示例数据
                        </a>
                        <div class="help">点击按钮，弹出导出配置窗口，支持 XLSX / CSV 格式</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection