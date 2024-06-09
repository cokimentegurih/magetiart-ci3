<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        return redirect('Auth');
    } else {

        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        if (!($menu == 'Admin' || $menu == 'User' || $menu == 'Auth')) {
            $queryMenu = $ci->db->get_where('submenu', ['url' => $menu])->row_array();
            $submenu_id = $queryMenu['id'];
            $userAccess = $ci->db->get_where('user_access_submenu', [
                'role_id' => $role_id,
                'submenu_id' => $submenu_id
            ]);

            if ($userAccess->num_rows() < 1) {
                redirect('Admin/blocked');
            }
        }
    }
}

function check_access($role_id, $submenu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('submenu_id', $submenu_id);
    $result = $ci->db->get('user_access_submenu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
