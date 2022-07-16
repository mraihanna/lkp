<?php

function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nip')) {
    redirect('auth');
  } else {
    $roleId = $ci->session->userdata('role_id');
    $menu   = $ci->uri->segment(1);

    $queryMenu  = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    $menuId     = $queryMenu['id'];

    $userAccess = $ci->db->get_where(
      'user_access_menu',
      [
        'role_id' => $roleId,
        'menu_id' => $menuId
      ]
    );

    if ($userAccess->num_rows() < 1) {
      redirect('errors/denied');
    }
  }
}

function check_access($role_id, $menu_id)
{
  $ci = get_instance();

  $ci->db->where('role_id', $role_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('user_access_menu');

  if ($result->num_rows() > 0) {
    return "checked ='checked'";
  }
}
