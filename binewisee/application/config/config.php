<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://localhost/binewise/';
$config['index_page'] = '';
$config['uri_protocol'] = 'AUTO';
$config['url_suffix'] = '';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array'] = TRUE;
$config['enable_csrf'] = FALSE;
$config['csrf_protection'] = FALSE;

// Session
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'binewise_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

// Cookie
$config['cookie_prefix'] = '';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = FALSE;
$config['cookie_httponly'] = FALSE;

$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['output_compression'] = FALSE;
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['rewrite_short_tags'] = FALSE;
$config['error_views_path'] = '';
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['encryption_key'] = 'binewise2024secretkey';
$config['use_page_numbers'] = FALSE;
$config['num_links'] = 2;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['item_limit_per_page'] = 20;
$config['max_filename'] = 255;
$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'jpg|jpeg|png|gif';
$config['max_size'] = 2048;
$config['proxy_ips'] = '';
$config['time_reference'] = 'local';
$config['uncaught_exception_handler'] = '';
