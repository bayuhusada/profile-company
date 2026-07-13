<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Frontend pages (Home controller)
$route['tentang'] = 'home/tentang';
$route['guru'] = 'home/guru';
$route['prestasi'] = 'home/prestasi';
$route['berita'] = 'home/berita';
$route['berita/detail/(:any)'] = 'home/berita_detail/$1';
$route['galeri'] = 'home/galeri';
$route['ppdb'] = 'home/ppdb';
$route['kontak'] = 'home/kontak';
$route['fasilitas'] = 'home/fasilitas';
$route['ekstrakurikuler'] = 'home/ekstrakurikuler';
$route['siswa'] = 'home/siswa';
$route['mata-pelajaran'] = 'home/mata_pelajaran';

// Auth
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['login'] = 'auth/login';

// Admin (Sneat) routes
$route['dashboard'] = 'dashboard';
$route['admin'] = 'dashboard';
$route['admin_profil'] = 'admin_profil';
$route['admin_berita'] = 'admin_berita';
$route['admin_berita/create'] = 'admin_berita/create';
$route['admin_berita/edit/(:num)'] = 'admin_berita/edit/$1';
$route['admin_berita/delete/(:num)'] = 'admin_berita/delete/$1';
$route['admin_kategori'] = 'admin_kategori';
$route['admin_kategori/create'] = 'admin_kategori/create';
$route['admin_kategori/edit/(:num)'] = 'admin_kategori/edit/$1';
$route['admin_kategori/delete/(:num)'] = 'admin_kategori/delete/$1';
$route['admin_prestasi'] = 'admin_prestasi';
$route['admin_prestasi/create'] = 'admin_prestasi/create';
$route['admin_prestasi/edit/(:num)'] = 'admin_prestasi/edit/$1';
$route['admin_prestasi/delete/(:num)'] = 'admin_prestasi/delete/$1';
$route['admin_guru'] = 'admin_guru';
$route['admin_guru/create'] = 'admin_guru/create';
$route['admin_guru/edit/(:num)'] = 'admin_guru/edit/$1';
$route['admin_guru/delete/(:num)'] = 'admin_guru/delete/$1';
$route['admin_galeri'] = 'admin_galeri';
$route['admin_galeri/upload'] = 'admin_galeri/upload';
$route['admin_galeri/edit_judul/(:num)'] = 'admin_galeri/edit_judul/$1';
$route['admin_galeri/delete/(:num)'] = 'admin_galeri/delete/$1';
$route['admin_ppdb'] = 'admin_ppdb';
$route['admin_kontak'] = 'admin_kontak';
$route['admin_fasilitas'] = 'admin_fasilitas';
$route['admin_fasilitas/create'] = 'admin_fasilitas/create';
$route['admin_fasilitas/edit/(:num)'] = 'admin_fasilitas/edit/$1';
$route['admin_fasilitas/delete/(:num)'] = 'admin_fasilitas/delete/$1';
$route['admin_ekstrakurikuler'] = 'admin_ekstrakurikuler';
$route['admin_ekstrakurikuler/create'] = 'admin_ekstrakurikuler/create';
$route['admin_ekstrakurikuler/edit/(:num)'] = 'admin_ekstrakurikuler/edit/$1';
$route['admin_ekstrakurikuler/delete/(:num)'] = 'admin_ekstrakurikuler/delete/$1';
$route['admin_pengaturan'] = 'admin_pengaturan';
$route['admin_administrator'] = 'admin_administrator';
$route['admin_administrator/create'] = 'admin_administrator/create';
$route['admin_administrator/edit/(:num)'] = 'admin_administrator/edit/$1';
$route['admin_administrator/delete/(:num)'] = 'admin_administrator/delete/$1';
$route['admin_siswa'] = 'admin_siswa';
$route['admin_siswa/create'] = 'admin_siswa/create';
$route['admin_siswa/edit/(:num)'] = 'admin_siswa/edit/$1';
$route['admin_siswa/delete/(:num)'] = 'admin_siswa/delete/$1';
$route['admin_kelas'] = 'admin_kelas';
$route['admin_kelas/create'] = 'admin_kelas/create';
$route['admin_kelas/edit/(:num)'] = 'admin_kelas/edit/$1';
$route['admin_kelas/delete/(:num)'] = 'admin_kelas/delete/$1';
$route['admin_mata_pelajaran'] = 'admin_mata_pelajaran';
$route['admin_mata_pelajaran/create'] = 'admin_mata_pelajaran/create';
$route['admin_mata_pelajaran/edit/(:num)'] = 'admin_mata_pelajaran/edit/$1';
$route['admin_mata_pelajaran/delete/(:num)'] = 'admin_mata_pelajaran/delete/$1';
