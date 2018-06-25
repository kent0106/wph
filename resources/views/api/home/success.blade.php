@extends('layouts.weui')
@section('content')
    <div class="weui-msg">
        <div class="weui-msg__icon-area"><i class="weui-icon-success weui-icon_msg"></i></div>
        <div class="weui-msg__text-area">
            <h2 class="weui-msg__title">{{ $data['title'] or '操作成功' }}</h2>
            <p class="weui-msg__desc">{{$data['desc'] or '您已成功注册成为爱谛沉香会员'}}</p>
        </div>
        <div class="weui-msg__opr-area">
            <p class="weui-btn-area">
                <a href="{{$data['url'] or '../user/center'}}"
                   class="weui-btn weui-btn_primary">{{$data['btn'] or '返回首页'}}</a>
            </p>
        </div>
        <div class="weui-msg__extra-area">
            <div class="weui-footer">
                <p class="weui-footer__links">
                    <a href="javascript:void(0);" class="weui-footer__link">爱谛集团</a>
                </p>
                <p class="weui-footer__text">Copyright &copy; 2008-2017 www.edichina.cc</p>
            </div>
        </div>
    </div>
@stop
