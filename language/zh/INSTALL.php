<?php
// Translated into English by Yaro2709;
// All rights reserved from 2020;
// Company 1367.

//NAVIGATION:
//{IDs_0001} General variables
//{IDs_0002} Introduction
//{IDs_0003} Update
//{IDs_0004} Test for minimum requirements
//{IDs_0005} Connect to the database
//{IDs_0006} Results of connecting to the database
//{IDs_0007} Database creation
//{IDs_0008} Create an account
//{IDs_0009} Complete the installation
//{IDs_0010} Installation summary
//{IDs_0011} Messages
//{IDs_0012} Carousels

//{IDs_0001} General variables
$LNG['game_name']                                    = '新星';
$LNG['nav_lang']                                     = '语言';
$LNG['footer_up']                                    = '返回顶部';
$LNG['back']                                         = '返回';
$LNG['continue']                                     = '下一步';
$LNG['login']                                        = '登录管理面板';
$LNG['title_install']                                = '安装程序';
$LNG['previous']                                     = '';
$LNG['next']                                         = '';
//{IDs_0002} Introduction
$LNG['intro_install']                                = '安装';
$LNG['intro_welcome']                                = '欢迎来到'.$LNG['game_name'].'！';
$LNG['intro_text']                                   = ''.$LNG['game_name'].' - 一款基于2Moons v1.8的最佳网页策略引擎之一。'.$LNG['game_name'].'是目前最稳定和最具发展潜力的引擎。我们希望'.$LNG['game_name'].'将超出您的预期。如果您有任何问题，请随时咨询我们。'.$LNG['game_name'].'是一个开源项目，采用GNU GPL v3许可。在安装之前，将会进行一个小型测试，以验证服务器是否符合最低要求。';
//{IDs_0003} Update
$LNG['upgrade_title']                                = '更新';
$LNG['upgrade_header']                               = '数据库更新向导';
$LNG['upgrade_text']                                 = '您已经安装了'.$LNG['game_name'].'，只想更新它吗？在这里，您可以通过几个点击来更新旧的数据库！';
$LNG['upgrade_success']                              = '数据库已成功升级到版本 %s。';
$LNG['upgrade_nothingtodo']                          = '无需操作，数据库的版本为 %s。';
$LNG['upgrade_available']                            = '有更新可用。数据库可以从当前的版本 %s 升级到版本 %s。';
$LNG['upgrade_notavailable']                         = '数据库使用了最新的版本 %s。';
//{IDs_0004} Test for minimum requirements
$LNG['req_head']                                     = '必需模块';
$LNG['req_text']                                     = '在继续安装'.$LNG['game_name'].'之前，系统将检查您的服务器配置文件，以确认是否符合使用'.$LNG['game_name'].'所需的基本要求。请仔细阅读结果，直到所有检查通过后才继续安装。如果您希望使用以下模块的功能，必须确保验证通过。';
$LNG['req_requirements']                             = '要求';
$LNG['req_status']                                   = '状态';
$LNG['reg_yes']                                      = '是';
$LNG['reg_no']                                       = '否';
$LNG['reg_writable']                                 = '(CHMOD 777)';
$LNG['reg_not_writable']                             = '没有写入权限';
$LNG['reg_file']                                     = '文件"%s"是否可写？';
$LNG['reg_dir']                                      = '文件夹"%s"是否可写？';
$LNG['req_php_need']                                 = '安装的PHP版本';
$LNG['req_php_need_desc']                            = 'PHP是游戏使用的服务器语言。'.$LNG['game_name'].'需要PHP v5.6到8.0版本。';
$LNG['reg_gd_need']                                  = '安装的"gdlib"图形库版本';
$LNG['reg_gd_desc']                                  = '"gdlib"图形库负责动态生成图像。没有此库，某些软件功能将无法使用。';
$LNG['reg_pdo_active']                               = '支持"PDO"扩展';
$LNG['reg_pdo_desc']                                 = '您必须提供PHP的PDO支持。';
$LNG['reg_json_need']                                = '"JSON"扩展是否可用？';
$LNG['reg_iniset_need']                              = 'PHP "ini_set"函数是否启用？';
$LNG['reg_global_need']                              = '"register_globals"参数是否禁用？';
$LNG['reg_global_desc']                              = ''.$LNG['game_name'].'将在此选项启用时正常工作。但为了安全起见，建议在PHP设置中禁用register_globals。';
$LNG['req_ftp_head']                                 = 'FTP';
$LNG['req_ftp_desc']                                 = '请输入您的FTP详细信息，以便安装程序自动修复错误。另外，您也可以手动设置写入权限。';
$LNG['req_ftp_host']                                 = 'FTP主机';
$LNG['req_ftp_username']                             = 'FTP登录';
$LNG['req_ftp_password']                             = 'FTP密码';
$LNG['req_ftp_dir']                                  = 'FTP路径到'.$LNG['game_name'];
$LNG['req_ftp_send']                                 = '设置CHMOD 777权限';
$LNG['req_ftp_error_data']                           = '无法使用提供的凭证连接到FTP服务器。';
$LNG['req_ftp_error_dir']                            = '文件夹指定不正确。';
//{IDs_0005} Connect to the database
$LNG['step1_head']                                   = '设置数据库访问';
$LNG['step1_text']                                   = ''.$LNG['game_name'].'可以在您的服务器上安装，但您需要指定数据库的访问设置。如果您不知道连接数据库的设置，请咨询您的托管服务提供商或联系'.$LNG['game_name'].'的技术支持。在输入数据时，请仔细检查，确保数据无误后再继续。';
$LNG['step1_mysql_server']                           = '数据库服务器名称';
$LNG['step1_mysql_port']                             = '数据库服务器端口';
$LNG['step1_mysql_dbuser']                           = '数据库用户登录';
$LNG['step1_mysql_dbpass']                           = '数据库用户密码';
$LNG['step1_mysql_dbname']                           = '数据库名称';
$LNG['step1_mysql_prefix']                           = '表前缀';
//{IDs_0006} Results of connecting to the database
$LNG['step2_prefix_invalid']                         = '数据库前缀必须只包含字母数字字符和下划线。';
$LNG['step2_db_no_dbname']                           = '未指定数据库名称。';
$LNG['step2_db_too_long']                            = '指定的表前缀太长，最大长度为36个字符。';
$LNG['step2_db_con_fail']                            = '无法连接到数据库。详细信息如下。';
$LNG['step2_config_exists']                          = 'config.php已存在。';
$LNG['step2_conf_op_fail']                           = '未设置config.php的写入权限。';
$LNG['step2_db_done']                                = '已成功连接到数据库。';
//{IDs_0007} Database creation
$LNG['step3_head']                                   = '创建数据库表';
$LNG['step3_text']                                   = '数据库表已创建并填充。继续下一步以完成'.$LNG['game_name'].'的安装。';
$LNG['step3_db_error']                               = '创建以下数据库表失败：';
//{IDs_0008} Create an account
$LNG['step4_head']				                     = '管理员账户';
$LNG['step4_text']				                     = '安装向导将为您创建一个管理员账户。请输入用户名、密码和电子邮件。';
$LNG['step4_admin_name']		                     = '管理员用户名：';
$LNG['step4_admin_name_desc']	                     = '请输入一个3到20个字符的用户名';
$LNG['step4_admin_pass']		                     = '管理员密码：';
$LNG['step4_admin_pass_desc']	                     = '请输入一个6到30个字符的密码';
$LNG['step4_admin_mail']		                     = '联系邮箱：';
//{IDs_0009} Complete the installation
$LNG['step6_head']                                   = '恭喜！您已成功设置'.$LNG['game_name'].' :)';
$LNG['step6_text']                                   = '点击下面的按钮，您将被重定向到管理员面板。请花一些时间熟悉可用的设置。在使用游戏之前，请删除文件"includes/ENABLE_INSTALL_TOOL"或重命名它。只要该文件存在，您的游戏就有可能受到黑客攻击！';
$LNG['step8_need_fields']                            = '您必须填写所有字段。';
//{IDs_0010} Installation summary
$LNG['sql_close_reason']                             = '服务器当前不可用';
$LNG['sql_welcome']                                  = '欢迎来到'.$LNG['game_name'].' v';
//{IDs_0011} Messages
$LNG['locked_upgrade']                               = '需要数据库更新！要激活更新过程，您必须在"include"文件夹中创建一个名为"ENABLE_INSTALL_TOOL"的文件。文件名必须是大写，文件本身可以为空。';
$LNG['locked_install']                               = '安装程序已锁定！在"includes"文件夹中创建一个名为"ENABLE_INSTALL_TOOL"的文件。文件名必须是大写，文件本身不带扩展名，可以为空。出于安全考虑，强烈建议安装完成后重命名或删除该文件。为了更安全，您也可以删除整个安装文件夹。';
//{IDs_0012} Carousels
$LNG['carousel_project_head']                        = '项目';
$LNG['carousel_project_text']                        = '该游戏基于2Moons v1.8。我们改进了它，重写了超过30%！';
$LNG['carousel_mods_head']                           = '修改';
$LNG['carousel_mods_text']                           = '我们开发了超过15个新修改并重写了超过10个！';
$LNG['carousel_design_head']                         = '响应式设计';
$LNG['carousel_design_text']                         = '我们使用著名的Bootstrap框架。';
$LNG['carousel_support_head']                        = '积极的支持';
$LNG['carousel_support_text']                        = '支持基于2Moons论坛和GitHub项目。';
$LNG['carousel_version_info_head']                   = '有什么新东西？';
$LNG['carousel_version_info_text']                   = '当然有！但要了解更多，您需要先安装游戏 :)';