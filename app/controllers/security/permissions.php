<?php
/*
	This file is part of Classroombookings.

	Classroombookings is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	Classroombookings is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Classroombookings.  If not, see <http://www.gnu.org/licenses/>.
*/


class Permissions extends Controller {


	var $tpl;
	

	function Permissions(){
		parent::Controller();
		$this->load->model('security');
		$this->tpl = $this->config->item('template');
		$this->output->enable_profiler(TRUE);
	}
	
	
	
	
	function index(){
		$icondata[0] = array('security/users', 'Manage users', 'user_orange.gif' );
		$icondata[1] = array('security/groups', 'Manage groups', 'group.gif' );
		$body['groups'] = $this->security->get_groups_dropdown();
		$body['permissions'] = $this->config->item('permissions');
		$body['group_permissions'] = $this->security->get_group_permissions();
		#print_r($body['permissions']);
		$tpl['pretitle'] = $this->load->view('parts/iconbar', $icondata, TRUE);
		$tpl['title'] = 'Permissions';
		$tpl['pagetitle'] = 'Manage group permissions';
		$tpl['body'] = $this->load->view('security/permissions.index.php', $body, TRUE);
		$this->load->view($this->tpl, $tpl);
	}
	
	
	
	
	function save(){
		$this->form_validation->set_rules('group_id', 'Group ID');
		$this->form_validation->set_rules('permissions', 'Permissions');
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		
		/* echo "submitted!";
		$serial = serialize($this->input->post('permissions'));
		echo strlen($serial); */
	}
	
	
	
	
}


?>
