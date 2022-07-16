<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
  //menu
  public function insertMenu()
  {
    $query  = "SELECT * FROM user_menu ORDER BY urutan DESC";
    $menu   = $this->db->query($query)->row_array();
    $urut   = $menu['urutan'] + 1;
    $data   = [
      'menu'      => $this->input->post('menu', true),
      'icon'      => $this->input->post('icon', true),
      'urutan'    => $urut,
      'is_active' => 1
    ];

    return $this->db->insert('user_menu', $data);
  }

  public function editMenu($id)
  {
    $data = [
      'menu'      => $this->input->post('menu', true),
      'icon'      => $this->input->post('icon', true),
      'is_active' => 1
    ];
    $this->db->where('id', $id);
    $this->db->update('user_menu', $data);
  }

  public function deleteMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');
  }

  //sub menu
  public function getSubMenu()
  {
    $query = "SELECT user_sub_menu.*, user_menu.menu
            FROM user_sub_menu JOIN user_menu
            ON user_sub_menu.menu_id = user_menu.id";
    return $this->db->query($query)->result_array();
  }

  public function insertSubMenu()
  {
    $menuId     = $this->input->post('menu_id');
    $query      = "SELECT * FROM user_sub_menu WHERE menu_id = $menuId ORDER BY urutan DESC";
    $subMenu    = $this->db->query($query)->row_array();
    if (!isset($subMenu['urutan'])) {
      $urut = 1;
    } else {
      $urut = $subMenu['urutan'] + 1;
    }
    $data = [
      'title'     => $this->input->post('title', true),
      'menu_id'   => $menuId,
      'url'       => $this->input->post('url', true),
      'urutan'    => $urut,
      'is_active' => $this->input->post('is_active', true)
    ];
    return $this->db->insert('user_sub_menu', $data);
  }

  public function editSubMenu($id)
  {
    $menuId     = $this->input->post('menu_id');

    $data = [
      'title'     => $this->input->post('title', true),
      'menu_id'   => $menuId,
      'url'       => $this->input->post('url', true),
      'is_active' => $this->input->post('is_active', true)
    ];

    $this->db->where('id', $id);
    $this->db->update('user_sub_menu', $data);
  }

  public function deleteSubMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');
  }
}
