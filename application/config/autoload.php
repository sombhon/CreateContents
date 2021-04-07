<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session','utility','database');

$autoload['drivers'] = array();

$autoload['helper'] = array('url');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array(
    'user_model' , 'ebook_model' , 'carts_model' , 'employee_model' ,'runnum_model' , 'default_setting/salesshare_model' ,'default_setting/scorediscount_model' , 'office_model' ,'library_model' ,'report_model'
);
