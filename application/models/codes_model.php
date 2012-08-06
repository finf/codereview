<?php
Class Codes_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();	
	}
	
	/**
	 * 保存案例
	 * @param string $title
	 * @param string $content
	 * @param string $tag
	 */
	function save($title, $content, $tag)
	{
		$account = $this->account_session->userdata('account');
		$codes['title'] = $title;
		$codes['content'] = $content;
		$codes['userid'] = $account['id'];
		$codes['username'] = $account['name'];
		$codes['ctime'] = date('Y-m-d H:i:s');
		$this->db->insert('codes', $codes);
		$codeId = $this->db->insert_id();
		
		//添加标签
		$tagArr = explode(' ', $tag);
		foreach ($tagArr as $tag) {
			$this->save_tag($tag, $codeId);
		}
		
		return $codeId;
	}
	
	/**
	 * 保存标签
	 * @param string $tag
	 * @param string $codeId
	 */
	function save_tag($tag, $codeId)
	{
		$tagResult = $this->db->get_where('tags',array('tag'=>$tag), 1);
		$result	= $tagResult->row_array();
		
		if (count($result) > 0) {
			$tagId = $result['id'];
		} else {
			$data = array('tag' => $tag);
			$this->db->insert('tags', $data);
			$tagId = $this->db->insert_id();
		}
		
		$data = array('code_id' => $codeId, 'tag_id' => $tagId);
		$this->db->insert('code_tag', $data);
	}
	
	/**
	 * 获取案例
	 * @param int $codeId
	 */
	function get_code($codeId)
	{
		$query = $this->db->get_where('codes', array('id' => $codeId));
		$result = $query->row_array();
		if (count($result) > 0) {
			$this->db->select('*');
			$this->db->from('code_tag');
			$this->db->join('tags', 'code_tag.tag_id = tags.id', 'left');
			$this->db->where('code_tag.code_id', $codeId);
			$query = $this->db->get();
			foreach ($query->result_array() as $row) {
				$result['tags'][] = $row['tag'];
			}
			return $result;
		}
		return false;
	}
}