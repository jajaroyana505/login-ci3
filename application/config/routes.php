<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// rout halaman login 
$route['login'] = 'auth/login/index';
$route['logout'] = 'auth/login/logout';

// route halaman dashboard
$route['dashboard'] = 'admin/dashboard';

// route halaman pegawai
$route['pegawai'] = 'admin/pegawai/index';
$route['tambah-pegawai'] = 'admin/pegawai/create';
$route['hapus-pegawai/(:num)'] = 'admin/pegawai/delete/$1';
$route['api-hapus-pegawai/(:num)'] = 'admin/pegawai/delete_api/$1';
$route['edit-pegawai/(:num)'] = 'admin/pegawai/edit/$1';
$route['detail-pegawai/(:num)'] = 'admin/pegawai/detail/$1';


// route halaman jabatan
$route['jabatan'] = 'admin/jabatan';
$route['tambah-jabatan'] = 'admin/jabatan/create';
$route['edit-jabatan/(:num)'] = 'admin/jabatan/edit/$1';
// route halaman registrasi
$route['registration'] = 'auth/registration';
$route['registration/proses'] = 'auth/registration/proses_register';

// route halaman user
$route['user'] = 'admin/user/index';
$route['tambah-user'] = 'admin/user/create';


// route penilaian
$route['penilaian'] = 'admin/penilaian/index';
$route['penilaian-pegawai/(:num)'] = 'admin/penilaian/penilaian_pegawai/$1';
$route['penilaian-simpan'] = 'admin/penilaian/create';
$route['penilaian-detail/(:num)'] = 'admin/penilaian/detail/$1';
