<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth routes
$route['auth']          = 'Auth/index';
$route['auth/login']    = 'Auth/login';
$route['auth/register'] = 'Auth/register';
$route['auth/logout']   = 'Auth/logout';
$route['auth/lupa']     = 'Auth/lupa';
$route['auth/reset']    = 'Auth/reset';

// Dashboard routes
$route['dashboard']       = 'Dashboard/index';
$route['dashboard/admin'] = 'Dashboard/admin';

// Laporan routes
$route['laporan']           = 'Laporan/index';
$route['laporan/tambah']    = 'Laporan/tambah';
$route['laporan/simpan']    = 'Laporan/simpan';
$route['laporan/detail/(:num)'] = 'Laporan/detail/$1';
$route['laporan/edit/(:num)']   = 'Laporan/edit/$1';
$route['laporan/update']        = 'Laporan/update';
$route['laporan/hapus/(:num)']  = 'Laporan/hapus/$1';

// Admin routes
$route['admin/laporan']                = 'Admin/laporan';
$route['admin/update_status']          = 'Admin/update_status';

// Akun routes
$route['akun/profil']  = 'Akun/profil';
$route['akun/simpan']  = 'Akun/simpan';

// Edukasi
$route['edukasi'] = 'Edukasi/index';

// Login admin POST
$route['auth/loginadmin_post'] = 'Auth/loginadmin_post';
$route['auth/loginwarga']      = 'Auth/loginwarga';
$route['auth/loginadmin']      = 'Auth/loginadmin';
