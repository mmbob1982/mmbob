<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>css/import.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>js/index.js"></script>
</head>
<body>
<!--▼wrapper▼-->
<div id="wrapper">
  <!--▼header▼-->
  <div id="header" class="clearfix">
    <h1 id="logo">标题在这里</h1>
    <!-- /header -->
  </div>
  <!--▼content▼-->
  <div id="content" class="clearfix">
    <div id="leftColumn">
      <h3 class="ttl">这里是分类</h3>
      <ul class="list_school">
	  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=042a445590dcda8cceb2752365b76883&sql=select+%2A+from+v9_category+where+module%3D%27yp%27+order+by+listorder+asc&cache=3600&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('sql'=>'select * from v9_category where module=\'yp\' order by listorder asc',)).'042a445590dcda8cceb2752365b76883');if(!$data = tpl_cache($tag_cache_name,3600)){pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_category where module='yp' order by listorder asc LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
	  <li><a href="index.php">全部</a></li>
	  <?php $n=1; if(is_array($data)) foreach($data AS $key => $v) { ?>
        <li><a href="index.php?m=content&c=index&a=ulist&sname=<?php echo $v['catname'];?>"><?php echo $v['catname'];?></a></li>
      <?php $n++;}unset($n); ?>
	  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
      </ul>
      <span class="line"></span> </div>
    <div id="rightColumn">
      <ul class="list_headers">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=39847552479aa74ab75ba7abbf160b09&sql=select+%2A+from+v9_yp_company+%24con+order+by+userid+desc&num=81&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_yp_company $con order by userid desc LIMIT 81");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?>
	    
		<?php $n=1; if(is_array($datas)) foreach($datas AS $key => $v) { ?>
        <li>
          <div class="s-pic"> <a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo $v['user_logo'];?>" alt="<?php echo $v['companyname'];?>" width="80" height="80"/></a> </div>
          <div class="intro">
            <h3><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['companyname'];?></a></h3>
            <p class="txt"><?php echo $v['jianjie'];?></p>
            <a class="pic" href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo $v['user_logo'];?>" width="150" height="150" alt="<?php echo $v['companyname'];?>" /></a> </div>
        </li>
       <?php $n++;}unset($n); ?>
	   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
      </ul>
    </div>
    <!-- /content -->
  </div>
  <!--▼footer▼-->
  <div id="footer" class="clearfix">
    <div class="copyright">
      <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">网站地图</a> | <a href="#">隐私保护</a></p>
      <p>国家信息产业部备案 <a class="tip" href="http://www.miibeian.gov.cn" target="_blank">鲁ICP备05047375</a> 【济南市公安局网警支队备案：37010009000020】 </p>
    </div>
    <!-- /footer -->
  </div>
  <!-- /wrapper -->
</div>
<script type="text/javascript">
  function foldPan(obj){
	  var str=$(obj).parent().attr('class');
	   if(str.indexOf('close')>=0){
		  $('#pan_01').css('display','block');		   
		   $('#pan_02').css('display','block');
		     $(obj).parent().removeClass('close')
		   $(obj).parent().addClass('open');
		   }else{
			$('#pan_01').css('display','none');		   
		   $('#pan_02').css('display','none');
		     $(obj).parent().removeClass('open')
		   $(obj).parent().addClass('close');
		      
			   }
	  }
</script>
<script type="text/javascript">
$(function(){
		   
$('.list_headers li').hover(function(){
    				$(this).css('z-index','10000')
					$(this).find('.intro').css('display','block')				  
								  },function(){
					$(this).css('z-index','')
    				$(this).find('.intro').css('display','none')				  
									  });
		   })
</script>
</body>
</html>
