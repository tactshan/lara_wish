<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>许愿墙</title>
    <script src="{{URL::asset('/js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{URL::asset('/js/index.js')}}"></script>
    <script src="{{URL::asset('/js/iepng.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('/css/index.css')}}">
</head>
<body>
<div id='top'>
    <span id='send'></span>
</div>
<div id='main'>
    @foreach($data as $k=>$v)
         <dl class='paper a1'>
             <dt>
                 <span class='username'>昵称:{{$v->w_name}}</span>
                 <span class='num'>许愿ID:{{$v->w_id}}</span>
             </dt>
                 <dd class='content'>{{$v->w_content}}</dd>
                 <dd class='bottom'>
             <span class='time'>{{date('Y-m-d H:i:s',$v->w_time)}}</span>
             <a href="" class='close'></a>
             </dd>
             </dl>
     @endforeach
</div>

<div id='send-form'>
    <p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>
    <form >
        <p>
            <label for="username">昵称：</label>
            <input type="text" name='username' id='username'/>
        </p>
        <p>
            <label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
            <textarea name="content" id='content'></textarea>
            <!--<div id='phiz'>-->
            <!--<img src="./Images/phiz/zhuakuang.gif" alt="抓狂" />-->
            <!--<img src="./Images/phiz/baobao.gif" alt="抱抱" />-->
            <!--<img src="./Images/phiz/haixiu.gif" alt="害羞" />-->
            <!--<img src="./Images/phiz/ku.gif" alt="酷" />-->
            <!--<img src="./Images/phiz/xixi.gif" alt="嘻嘻" />-->
            <!--<img src="./Images/phiz/taikaixin.gif" alt="太开心" />-->
            <!--<img src="./Images/phiz/touxiao.gif" alt="偷笑" />-->
            <!--<img src="./Images/phiz/qian.gif" alt="钱" />-->
            <!--<img src="./Images/phiz/huaxin.gif" alt="花心" />-->
            <!--<img src="./Images/phiz/jiyan.gif" alt="挤眼" />-->
            <!--</div>-->
        </p>
        <!--图像域也有提交的功能  type="image"-->
{{--        <input type="image" id="img_sen" src="{{URL::asset('/Images/send-btn.png')}}" style="width:120px;height:50px;float:right;margin:10px;border:0;">--}}
        <img id="img_sen" src="{{URL::asset('/Images/send-btn.png')}}" style="width:120px;height:50px;float:right;margin:10px;border:0;">
    </form>
</div>
<!--[if IE 6]>
<!--<script type="text/javascript">-->
    <!--DD_belatedPNG.fix('#send,#close,.close','background');-->
<!--</script>-->
{{--<![endif]-->--}}
</body>
</html>
<script>
    $(function(){
        $('#img_sen').click(function(){
            var username=$('#username').val();
            var content=$('#content').val();
            $.ajax({
                url:"/wish/data",
                data:{username:username,content:content},
                method:'POST',
                success:function(msg){
                    if(msg==1){
                        alert('发布成功')
                        location.href='/wish';
                    }else{
                        alert('发布失败！请及时联系管理员！')
                    }
                }
            })
        })
    })
</script>