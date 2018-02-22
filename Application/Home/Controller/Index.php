<?php
namespace app\user\controller;


class Index  extends \think\Controller
{
    public function r404()
    {
    		
        return $this->fetch('404');
    }
    public function r500()
    {
    		
        return $this->fetch('500');
    }
    public function agile_board()
    {
    		
        return $this->fetch('agile_board');
    }
    public function article()
    {
    		
        return $this->fetch('article');
    }
    public function badges_labels()
    {
    		
        return $this->fetch('badges_labels');
    }
    public function basic_gallery()
    {
    		
        return $this->fetch('basic_gallery');
    }
    public function blog()
    {
    		
        return $this->fetch('blog');
    }
    public function blueimp()
    {
    		
        return $this->fetch('blueimp');
    }
    public function buttons()
    {
    		
        return $this->fetch('buttons');
    }
    public function calendar()
    {
    		
        return $this->fetch('calendar');
    }
    public function carousel()
    {
    		
        return $this->fetch('carousel');
    }
    public function chat_view()
    {
    		
        return $this->fetch('chat_view');
    }
    public function clients()
    {
    		
        return $this->fetch('clients');
    }
    public function code_editor()
    {

        return $this->fetch('code_editor');
    }
    public function contacts()
    {
    		
        return $this->fetch('contacts');
    }
    public function css_animation()
    {
    		
        return $this->fetch('css_animation');
    }
    public function diff()
    {
    		
        return $this->fetch('diff');
    }
    public function draggable_panels()
    {
    		
        return $this->fetch('draggable_panels');
    }
    public function empty_page()
    {
    		
        return $this->fetch('empty_page');
    }
    public function faq()
    {
    		
        return $this->fetch('faq');
    }
    public function file_manager()
    {
    		
        return $this->fetch('file_manager');
    }
    public function fontawesome()
    {
    		
        return $this->fetch('fontawesome');
    }
    public function form_advanced()
    {
    		
        return $this->fetch('form_advanced');
    }
    public function form_avatar()
    {
    		
        return $this->fetch('form_avatar');
    }
    public function form_basic()
    {
    		
        return $this->fetch('form_basic');
    }
    public function form_builder()
    {
    		
        return $this->fetch('form_builder');
    }
    public function form_editors()
    {
    		
        return $this->fetch('form_editors');
    }
    public function form_file_upload()
    {
    		
        return $this->fetch('form_file_upload');
    }
    public function form_markdown()
    {
    		
        return $this->fetch('form_markdown');
    }
    public function form_simditor()
    {
    		
        return $this->fetch('form_simditor');
    }
    public function form_validate()
    {
    		
        return $this->fetch('form_validate');
    }
    public function form_webuploader()
    {
    		
        return $this->fetch('form_webuploader');
    }
    public function form_wizard()
    {
    		
        return $this->fetch('form_wizard');
    }
    public function forum_main()
    {
    		
        return $this->fetch('forum_main');
    }
    public function glyphicons()
    {
    		
        return $this->fetch('glyphicons');
    }
    public function graph_echarts()
    {
    		
        return $this->fetch('graph_echarts');
    }
    public function graph_flot()
    {
    		
        return $this->fetch('graph_flot');
    }
    public function graph_metrics()
    {
    		
        return $this->fetch('graph_metrics');
    }
    public function graph_morris()
    {
    		
        return $this->fetch('graph_morris');
    }
    public function graph_peity()
    {
    		
        return $this->fetch('graph_peity');
    }
    public function graph_rickshaw()
    {
    		
        return $this->fetch('graph_rickshaw');
    }
    public function graph_sparkline()
    {
    		
        return $this->fetch('graph_sparkline');
    }
    public function grid_options()
    {
    		
        return $this->fetch('grid_options');
    }
    public function iconfont()
    {
    		
        return $this->fetch('iconfont');
    }
    public function index()
    {
    		
        return $this->fetch('index');
    }
    public function index_v1()
    {
    		
        return $this->fetch('index_v1');
    }
    public function index_v2()
    {
    		
        return $this->fetch('index_v2');
    }
    public function index_v3()
    {
    		
        return $this->fetch('index_v3');
    }
    public function index_v4()
    {
    		
        return $this->fetch('index_v4');
    }
    public function index_v5()
    {
    		
        return $this->fetch('index_v5');
    }
    public function invoice()
    {
    		
        return $this->fetch('invoice');
    }
    public function invoice_print()
    {
    		
        return $this->fetch('invoice_print');
    }
    public function jstree()
    {
    		
        return $this->fetch('jstree');
    }
    public function layer()
    {
    		
        return $this->fetch('layer');
    }
    public function layerdate()
    {
    		
        return $this->fetch('layerdate');
    }
    public function layerphotos()
    {
    		
        return $this->fetch('layerphotos');
    }
    public function layouts()
    {
    		
        return $this->fetch('layouts');
    }
    public function lockscreen()
    {
    		
        return $this->fetch('lockscreen');
    }
    public function login()
    {
    		
        return $this->fetch('login');
    }
    public function login_v2()
    {
    		
        return $this->fetch('login_v2');
    }
    public function mailbox()
    {
    		
        return $this->fetch('mailbox');
    }
    public function mail_compose()
    {
    		
        return $this->fetch('mail_compose');
    }
    public function mail_detail()
    {
    		
        return $this->fetch('mail_detail');
    }
    public function modal_window()
    {
    		
        return $this->fetch('modal_window');
    }
    public function nestable_list()
    {
    		
        return $this->fetch('nestable_list');
    }
    public function notifications()
    {
    		
        return $this->fetch('notifications');
    }
    public function pin_board()
    {
    		
        return $this->fetch('pin_board');
    }
    public function plyr()
    {
    		
        return $this->fetch('plyr');
    }
    public function profile()
    {
    		
        return $this->fetch('profile');
    }
    public function projects()
    {
    		
        return $this->fetch('projects');
    }
    public function project_detail()
    {
    		
        return $this->fetch('project_detail');
    }
    public function register()
    {
    		
        return $this->fetch('register');
    }
    public function search_results()
    {
    		
        return $this->fetch('search_results');
    }
    public function social_feed()
    {
    		
        return $this->fetch('social_feed');
    }
    public function spinners()
    {
    		
        return $this->fetch('spinners');
    }
    public function suggest()
    {
    		
        return $this->fetch('suggest');
    }
    public function sweetalert()
    {
    		
        return $this->fetch('sweetalert');
    }
    public function table_basic()
    {
    		
        return $this->fetch('table_basic');
    }
    public function table_bootstrap()
    {
    		
        return $this->fetch('table_bootstrap');
    }
    public function table_data_tables()
    {
    		
        return $this->fetch('table_data_tables');
    }
    public function table_foo_table()
    {
    		
        return $this->fetch('table_foo_table');
    }
    public function table_jqgrid()
    {
    		
        return $this->fetch('table_jqgrid');
    }
    public function tabs_panels()
    {
    		
        return $this->fetch('tabs_panels');
    }
    public function teams_board()
    {
    		
        return $this->fetch('teams_board');
    }
    public function timeline()
    {
    		
        return $this->fetch('timeline');
    }
    public function timeline_v2()
    {
    		
        return $this->fetch('timeline_v2');
    }
    public function toastr_notifications()
    {
    		
        return $this->fetch('toastr_notifications');
    }
    public function tree_view()
    {
    		
        return $this->fetch('tree_view');
    }
    public function typography()
    {
    		
        return $this->fetch('typography');
    }
    public function webim()
    {
    		
        return $this->fetch('webim');
    }
    public function widgets()
    {
    		
        return $this->fetch('widgets');
    }
}
