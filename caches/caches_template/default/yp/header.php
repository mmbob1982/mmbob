<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>default_blue.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>default_yp_blue.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>jquery.sGallery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>yp_common.js"></script>
</head>
<body>
<div class="body-top">
    <div class="content">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2e3bec5eab254972ef7678fb28fb15b9&action=position&posid=9&order=id&num=10&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('posid'=>'9','order'=>'id',)).'2e3bec5eab254972ef7678fb28fb15b9');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'9','order'=>'id','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
    		<div id="announ">
                 <ul>
                 <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                      <li><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></li>
                      <?php $n++;}unset($n); ?>
                 </ul>
            </div>
     <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <div class="login lh24 blue"><a href="<?php echo APP_PATH;?>index.php?m=content&c=rss&siteid=<?php echo get_siteid();?>" class="rss ib">rss</a><span class="rt"><script type="text/javascript">document.write('<iframe src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=<?php echo get_siteid();?>" allowTransparency="true"  width="500" height="24" frameborder="0" scrolling="no"></iframe>')</script></span></div>
    </div>
</div>
<div class="header">
	<div class="logo"><a href="<?php echo siteurl($siteid);?>/"><img src="<?php echo IMG_PATH;?>v9/logo.jpg" /></a></div>
    <div class="search">
    	<div class="tab">
			<?php $j=0; $siteid = get_siteid();?>
			<?php $search_model = getcache('search_model_'.$siteid, 'search');?>
			<?php $n=1;if(is_array($search_model)) foreach($search_model AS $k=>$v) { ?>
			<?php $j++;?>
				<a href="javascript:;" onclick="setmodel(<?php echo $v['typeid'];?>, $(this));" style="outline:medium none;" hidefocus="true" <?php if($j==1 && $typeid=$v['typeid']) { ?> class="on" <?php } ?>><?php echo $v['name'];?></a><?php if($j != count($search_model)) { ?><span> | </span><?php } ?>
			<?php $n++;}unset($n); ?>
			<?php unset($j);?>
		</div>

        <div class="bd">
           <form action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
				<input type="hidden" name="m" value="search"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="init"/>
				<input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
				<input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
                <input type="text" class="text" name="q" id="q"/><input type="submit" value="搜 索" class="button" />
            </form>
        </div>
    </div>
    <div class="banner"><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=1"></script></div>
    <div class="bk3"></div>
    <div class="nav-bar">
    	<map>
		<?php if(!function_exists('get_yp_url')) pc_base::load_app_func('global', 'yp');?>
        	<ul class="nav-site">
            	<li><a href="<?php echo siteurl($siteid);?>" class="on"><span>首页</span></a></li>
				<li class="line">|</li>
				<li><a href="<?php echo get_yp_url();?>" ><span>企业黄页</span></a></li>
             <?php $n=1;if(is_array($this->models)) foreach($this->models AS $r) { ?>
			 <?php $r['setting'] = string2array($r['setting']);?>
			 <?php if($r['setting']['ismenu']) { ?>
				<li class="line">|</li>
				<li><a href="<?php echo get_yp_url('model', $r['modelid']);?>"><span><?php echo $r['name'];?></span></a></li>
			 <?php } ?>
			 <?php $n++;}unset($n); ?>
				 <li class="line">|</li>
				<li><a href="<?php echo get_yp_url('company');?>"><span>企业库</span></a></li>
            </ul>
        </map>
    </div>
    <div class="subnav">
    	<div class="rt nav-car" id="buy_show" style="display:none;">购物车 <strong class="F_arial" id="buy_show_num">2</strong> 件<span> | </span> <a href="<?php echo APP_PATH;?>index.php?m=yp&c=index&a=buycar_list">去结算</a></div>热搜：<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"block\" data=\"op=block&tag_md5=b96986b21cebc38f605cd46d0255c9b5&pos=yp_hot\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">添加碎片</a>";}$block_tag = pc_base::load_app_class('block_tag', 'block');echo $block_tag->pc_tag(array('pos'=>'yp_hot',));?><?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
</div>