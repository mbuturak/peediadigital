<?php

function convertToSEO($text)
{

    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));
}

function getActiveUser()
{
    $t = &get_instance();

    $user = $t->session->userdata("user");

    if ($user)
        return $user;
    else
        return false;
}

function convertisActiveWithBadge($isActive)
{
    switch ($isActive) {
        case 0:
            return "<span class='badge bg-danger'>Pasif</span>";
            break;
        case 1:
            return "<span class='badge bg-success'>Aktif</span>";
            break;
        case 2:
            return "<span class='badge bg-warning'>Bekliyor</span>";
            break;
    }
}


// Functions

function getSocialLinks()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_social";
    $query = $ci->db->query($sql);
    return $query->result();
}

