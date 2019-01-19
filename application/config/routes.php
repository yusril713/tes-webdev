<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages';
$route['home'] = 'pages/login';
$route['simpan_makanan'] = 'pages/simpan_makanan';
$route['simpan_minuman'] = 'pages/simpan_minuman';
$route['daftar-makanan'] = 'pages/daftar_makanan';
$route['daftar-minuman'] = 'pages/daftar_minuman';
$route['daftar-makanan/(:any)'] = 'pages/edit_makanan';
$route['buat-pesanan'] = 'pages/buat_pesanan';
$route['logout'] = 'pages/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
