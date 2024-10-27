<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        set_pesan('silahkan login.');
        redirect('auth');
    }
}

function is_admin()
{
    $ci = get_instance();
    $id = $ci->session->userdata('id');

    $user = $ci->db->get_where("users", ["id" => "$id"])->row_array();


    $status = true;

    if ($user['role'] != 'admin') {
        $status = false;
    }

    return $status;
}


function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-success'><strong>SUCCESS!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    } else {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}
