<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
    </div>
</div>

<div class="pad-lr-10">



<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td><div class="explain-col">
		留言类型: &nbsp;&nbsp;<a href="?m=yp&c=guestbook&a=init">全部</a> &nbsp;&nbsp;
		<a href="?m=yp&c=guestbook&a=init&status=0">未读</a> &nbsp;&nbsp;
		<a href="?m=yp&c=guestbook&a=init&status=1">已读</a>&nbsp;&nbsp;
		<a href="?m=yp&c=guestbook&a=init&status=1&is_s=1">悄悄话</a>&nbsp;&nbsp;&nbsp;
				</div>
		</td>
		</tr>
    </tbody>
</table>

<form name="myform" id="myform" action="?m=yp&c=company&a=delete" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="20" align="center"><?php echo L('company_userid')?></th>
			<th width="60"><?php echo L('username')?></th>
			<th width="100">留言人</th>
			<th>留言内容</th>
			<th width="4%" align="center"><?php echo L('status')?></th>
			<th width="4%" align="center">悄悄话</th>
			<!--<th width="12%" align="center"><?php echo L('operations_manage')?></th>-->
		</tr>
	</thead>
<tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		$memberinfo = $this->db->get_one(array('userid'=>$info['userid']), 'username, groupid');
		$companyinfo = $this->yp_company->get_one(array('userid'=>$info['userid']), 'companyname,url');
		?>
	<tr>
		<td align="center" width="20"><?php echo $info['gid']?></td>
		<td align="center" width="60"><a href="<?php echo $companyinfo['url']?>" target="_blank"><?php echo $companyinfo['companyname']?></a></td>
		<td align="center" width="100"><?php echo $info['username']?></td>
		<td align="center"><?php echo $info['content']?></td>
		<td width="4%" align="center"><?php if ($info['status']==0) {?>
 			<font color=red>未读</font>
 			<?php }elseif($info['status']=='1'){echo '<font color="green">已读</font>';}?> </td>
		<td width="4%" align="center"><?php if ($info['is_s']==0) {?>
 			<font color=red>否</font>
 			<?php }elseif($info['is_s']=='1'){echo '<font color="green">是</font>';}?> </td>
		<!--<td align="center" width="12%"><a href="###"
			onclick="edit(<?php echo $info['userid']?>, '<?php echo new_addslashes($info['companyname'])?>')"
			title="<?php echo L('edit')?>"><?php echo L('edit')?></a> |  <a
			href='?m=yp&c=company&a=delete&userid=<?php echo $info['userid']?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes($info['companyname'])))?>')"><?php echo L('delete')?></a>
		</td>-->
	</tr>
	<?php
	}
}
?>
</tbody>
</table>
</div>
<!--<div class="btn">
<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', true)"><?php echo L('select_all')?></a>/<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', false)"><?php echo L('cancel')?></a> &nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="return confirm('<?php echo L('confirm', array('message' => L('selected')))?>')" value="<?php echo L('delete')?>"/>
&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="document.myform.action='?m=yp&c=company&a=passed_check&status=1'" value="<?php echo L('passed_checked')?>"/>
&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="document.myform.action='?m=yp&c=company&a=passed_check&status=0'" value="<?php echo L('unpass_checked')?>"/>
&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="document.myform.action='?m=yp&c=company&a=elite&status=1'" value="<?php echo L('elite_company')?>"/>
&nbsp;&nbsp;<input type="submit" class="button" name="dosubmit" onclick="document.myform.action='?m=yp&c=company&a=elite&status=0'" value="<?php echo L('unelite_company')?>"/>

</div>-->
<div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">

function edit(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit')?> '+name+' ',id:'edit',iframe:'?m=yp&c=company&a=edit&userid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}

function EditUser(id, name) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit_ajax_user')?>'+name+'<?php echo L('right_symbol')?>',id:'edit',iframe:'?m=member&c=member&a=edit&userid='+id,width:'700',height:'500'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
function checkuid() {
	var ids='';
	$("input[name='userid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:"<?php echo L('before_select_operations')?>",lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	} else {
		myform.submit();
	}
}
</script>
</body>
</html>
