<?php if (!defined('THINK_PATH')) exit();?><nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="slimScrollDiv" style="position: relative; width: auto; height: 100%;"><div class="sidebar-collapse" style="width: auto; height: 100%;">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/static/img/profile_small.jpg"></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="/user/index//form_avatar" data-index="0">修改头像</a>
                                </li>
                                <li><a class="J_menuItem" href="/user/index//profile" data-index="1">个人资料</a>
                                </li>
                                <li><a class="J_menuItem" href="/user/index//contacts" data-index="2">联系我们</a>
                                </li>
                                <li><a class="J_menuItem" href="/user/index//mailbox" data-index="3">信箱</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="/user/index//login">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a class="J_menuItem" href="/user/index//index_v1" data-index="0">主页示例一</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//index_v2" data-index="5">主页示例二</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//index_v3" data-index="6">主页示例三</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//index_v4" data-index="7">主页示例四</a>
                            </li>
                            <li>
                                <a href="/user/index//index_v5" target="_blank">主页示例五</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a class="J_menuItem" href="/user/index//layouts" data-index="8"><i class="fa fa-columns"></i> <span class="nav-label">布局</span></a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">统计图表</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_echarts" data-index="9">百度ECharts</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_flot" data-index="10">Flot</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_morris" data-index="11">Morris.js</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_rickshaw" data-index="12">Rickshaw</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_peity" data-index="13">Peity</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_sparkline" data-index="14">Sparkline</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//graph_metrics" data-index="15">图表组合</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/user/index//mailbox"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//mailbox" data-index="16">收件箱</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//mail_detail" data-index="17">查看邮件</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//mail_compose" data-index="18">写信</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">表单</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//form_basic" data-index="19">基本表单</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//form_validate" data-index="20">表单验证</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//form_advanced" data-index="21">高级插件</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//form_wizard" data-index="22">表单向导</a>
                            </li>
                            <li>
                                <a href="#">文件上传 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//form_webuploader" data-index="23">百度WebUploader</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//form_file_upload" data-index="24">DropzoneJS</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//form_avatar" data-index="25">头像裁剪上传</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">编辑器 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//form_editors" data-index="26">富文本编辑器</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//form_simditor" data-index="27">simditor</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//form_markdown" data-index="28">MarkDown编辑器</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//code_editor" data-index="29">代码编辑器</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//suggest" data-index="30">搜索自动补全</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//layerdate" data-index="31">日期选择器layerDate</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">页面</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//contacts" data-index="32">联系人</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//profile" data-index="33">个人资料</a>
                            </li>
                            <li>
                                <a href="#">项目管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//projects" data-index="34">项目</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//project_detail" data-index="35">项目详情</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//teams_board" data-index="36">团队管理</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//social_feed" data-index="37">信息流</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//clients" data-index="38">客户管理</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//file_manager" data-index="39">文件管理器</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//calendar" data-index="40">日历</a>
                            </li>
                            <li>
                                <a href="#">博客 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//blog" data-index="41">文章列表</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//article" data-index="42">文章详情</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//faq" data-index="43">FAQ</a>
                            </li>
                            <li>
                                <a href="#">时间轴 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//timeline" data-index="44">时间轴</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//timeline_v2" data-index="45">时间轴v2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//pin_board" data-index="46">标签墙</a>
                            </li>
                            <li>
                                <a href="#">单据 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//invoice" data-index="47">单据</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//invoice_print" data-index="48">单据打印</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//search_results" data-index="49">搜索结果</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//forum_main" data-index="50">论坛</a>
                            </li>
                            <li>
                                <a href="#">即时通讯 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//chat_view" data-index="51">聊天窗口</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//webim" data-index="52">layIM</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">登录注册相关 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a href="/user/index//login" target="_blank">登录页面</a>
                                    </li>
                                    <li><a href="/user/index//login_v2" target="_blank">登录页面v2</a>
                                    </li>
                                    <li><a href="/user/index//register" target="_blank">注册页面</a>
                                    </li>
                                    <li><a href="/user/index//lockscreen" target="_blank">登录超时</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//404" data-index="53">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//500" data-index="54">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//empty_page" data-index="55">空白页</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI元素</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//typography" data-index="56">排版</a>
                            </li>
                            <li>
                                <a href="#">字体图标 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li>
                                        <a class="J_menuItem" href="/user/index//fontawesome" data-index="57">Font Awesome</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="/user/index//glyphicons" data-index="58">Glyphicon</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="/user/index//iconfont" data-index="59">阿里巴巴矢量图标库</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">拖动排序 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//draggable_panels" data-index="60">拖动面板</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//agile_board" data-index="61">任务清单</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//buttons" data-index="62">按钮</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//tabs_panels" data-index="63">选项卡 &amp; 面板</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//notifications" data-index="64">通知 &amp; 提示</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//badges_labels" data-index="65">徽章，标签，进度条</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/user/index//grid_options" data-index="66">栅格</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//plyr" data-index="67">视频、音频</a>
                            </li>
                            <li>
                                <a href="#">弹框插件 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//layer" data-index="68">Web弹层组件layer</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//modal_window" data-index="69">模态窗口</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//sweetalert" data-index="70">SweetAlert</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">树形视图 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a class="J_menuItem" href="/user/index//jstree" data-index="71">jsTree</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//tree_view" data-index="72">Bootstrap Tree View</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/user/index//nestable_list" data-index="73">nestable</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//toastr_notifications" data-index="74">Toastr通知</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//diff" data-index="75">文本对比</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//spinners" data-index="76">加载动画</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//widgets" data-index="77">小部件</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">表格</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//table_basic" data-index="78">基本表格</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//table_data_tables" data-index="79">DataTables</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//table_jqgrid" data-index="80">jqGrid</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//table_foo_table" data-index="81">Foo Tables</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//table_bootstrap" data-index="82">Bootstrap Table
                                <span class="label label-danger pull-right">推荐</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">相册</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//basic_gallery" data-index="83">基本图库</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//carousel" data-index="84">图片切换</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//layerphotos" data-index="85">layer相册</a>
                            </li>
                            <li><a class="J_menuItem" href="/user/index//blueimp" data-index="86">Blueimp相册</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="J_menuItem" href="/user/index//css_animation" data-index="87"><i class="fa fa-magic"></i> <span class="nav-label">CSS动画</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">工具 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="/user/index//form_builder" data-index="88">表单构建器</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 30px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.9; z-index: 90; right: 1px;"></div></div>
        </nav>