<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('yp', 'member_header'); ?>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>

<script type="text/javascript">
<!--
	var charset = '<?php echo CHARSET;?>';
	var uploadurl = '<?php echo pc_base::load_config('system','upload_url')?>';
//-->
</script> 

<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<div id="memberArea">
	<?php include template('yp', 'member_left'); ?>
	 <div class="col-auto">
		<div class="col-1 ">
		<h6 class="title">查看留言</h6>
		<div class="content">
		<form name="myform" action="<?php echo APP_PATH;?>index.php?m=yp&c=business&a=guestbook&action=edit&gid=<?php echo $gid;?>" method="post" id="myform">
		<table width="100%" cellspacing="0" class="table_form">
		    <tr>
		       <th width="100">留言账号：</th>
		       <td> <?php echo $username;?></td>
		     </tr>
		     
		     <tr>
		       <th>联系电话：</th>
		       <td><?php echo $telephone;?></td>
		     </tr>
			 <tr>
		       <th>E_mail/QQ：</th>
		       <td><?php echo $qq;?></td>
		     </tr> 
			 
		      <tr>
		       <th>留言内容：</th>
		       <td><?php echo $content;?></td>
		     </tr> 
			 
		      <tr>
		       <th>留言日期：</th>
		       <td>  <?php echo date('Y-m-d',$addtime);?></td>
		     </tr> 
		     <tr>
		       <td></td>
		       <td colspan="2"><label>
		         <input type="submit" name="dosubmit" id="dosubmit" value="标记已读" class="button"/>
		         </label></td>
		     </tr>
		   </table>
		   </form>
		   </div>
		   <span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
		   </div>
  	</div>
   
</div>
<div class="clear"></div> 
<?php include template('member', 'footer'); ?>