<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理中心</title>
<meta name="description" content="商户中心" />
<meta name="keywords" content="管理中心" />
<link href="{{ asset('/css/newstyle.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('/static/js/jquery-ui.css') }} " rel="stylesheet" type="text/css" />
 
<script src="{{ asset('/static/js/jquery.min.js') }}"></script>
<script src="{{ asset('/static/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/static/js/layer/layer.js') }}"></script>
<script>
var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';
</script>


</head>
<body>
<iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>

@yield('content')

</body>


</html>