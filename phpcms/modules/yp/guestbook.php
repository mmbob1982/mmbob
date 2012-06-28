<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form', '', '');
class guestbook extends admin {
	private $yp_guestbook,$db;

	function __construct() {
		parent::__construct();
		$this->yp_guestbook = pc_base::load_model('yp_guestbook_model');
		$this->yp_company = pc_base::load_model('yp_company_model');
		$this->db = pc_base::load_model('member_model');
  	}

	public function init() {
 		$status = $_GET['status'];
		$is_s = $_GET['is_s'];
		if($status!=''){
			$where = array("status"=>$status);
		}
		if($is_s!=''){
			$where = array("is_s"=>$is_s);
		}
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$infos = $this->yp_guestbook->listinfo($where,$order = 'addtime desc',$page, $pages = '9');
		$pages = $this->yp_guestbook->pages;
 		$show_header = true;
 		include $this->admin_tpl('guestbook_list');
 	}
}
?>