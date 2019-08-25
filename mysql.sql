-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2019-07-10 15:31:43
-- 服务器版本： 5.7.23
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库： `frame`
--

-- --------------------------------------------------------

--
-- 表的结构 `xin_config`
--

CREATE TABLE `xin_config` (
  `config_id` int(11) NOT NULL,
  `website_name` varchar(30) NOT NULL COMMENT '网站名称',
  `website_ename` varchar(255) DEFAULT NULL COMMENT '网站英文名称',
  `website_indexurl` varchar(200) NOT NULL COMMENT '网站前台首页',
  `website_adminurl` varchar(200) NOT NULL COMMENT '网站后台首页',
  `website_slogan` varchar(500) NOT NULL COMMENT '口号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xin_config`
--

INSERT INTO `xin_config` (`config_id`, `website_name`, `website_ename`, `website_indexurl`, `website_adminurl`, `website_slogan`) VALUES
(1, 'Admin', 'Admin', 'http://www.frame.xin', 'http://www.frame.xin/admin', '一切都是最好的安排');

-- --------------------------------------------------------

--
-- 表的结构 `xin_group`
--

CREATE TABLE `xin_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL COMMENT '用户组名称',
  `group_icon` varchar(200) DEFAULT NULL COMMENT '用户组图标',
  `group_purview` varchar(1000) NOT NULL COMMENT '用户组权限',
  `group_status` tinyint(4) NOT NULL COMMENT '用户组状态 1:正常 0:禁用',
  `group_time` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xin_group`
--

INSERT INTO `xin_group` (`group_id`, `group_name`, `group_icon`, `group_purview`, `group_status`, `group_time`) VALUES
(1, '超级管理员', '', 'all', 1, 1231231231),
(2, '团长', NULL, '2,3', 1, 1562569169),
(3, '骑手', NULL, '', 1, 1562666184);

-- --------------------------------------------------------

--
-- 表的结构 `xin_member`
--

CREATE TABLE `xin_member` (
  `member_id` int(11) NOT NULL,
  `member_name` char(20) NOT NULL COMMENT '会员名称',
  `member_mobile` char(11) NOT NULL COMMENT '会员手机号',
  `member_password` varchar(16) NOT NULL COMMENT '登陆密码',
  `member_encrypt_str` varchar(5) NOT NULL COMMENT '密码加密字符串',
  `member_group` int(11) NOT NULL COMMENT '关联用户组',
  `member_is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否允许登陆后台 1:允许 0:不允许',
  `member_forbidden` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否被禁止登录 0:禁止 1:正常',
  `member_is_vip` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是VIP 0：非',
  `member_last_ip` varchar(20) DEFAULT NULL COMMENT '最后登陆ip',
  `member_last_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `member_time` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xin_member`
--

INSERT INTO `xin_member` (`member_id`, `member_name`, `member_mobile`, `member_password`, `member_encrypt_str`, `member_group`, `member_is_admin`, `member_forbidden`, `member_is_vip`, `member_last_ip`, `member_last_time`, `member_time`) VALUES
(1, 'Justin', '18365976266', 'I2ZGQ0ODZlMDc2NT', 'dwe24', 1, 1, 1, 0, '::1', 1562639832, 1548766164);

-- --------------------------------------------------------

--
-- 表的结构 `xin_menu`
--

CREATE TABLE `xin_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL COMMENT '菜单名',
  `menu_url` varchar(255) DEFAULT NULL COMMENT '跳转链接',
  `menu_icon` varchar(255) DEFAULT NULL COMMENT '菜单图标',
  `menu_parent` int(11) DEFAULT '0' COMMENT '上级，默认为0',
  `menu_rank` tinyint(4) DEFAULT '0' COMMENT '菜单权重',
  `menu_status` tinyint(4) DEFAULT '1' COMMENT '是否可用',
  `menu_time` int(11) DEFAULT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xin_menu`
--

INSERT INTO `xin_menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent`, `menu_rank`, `menu_status`, `menu_time`) VALUES
(1, '首页', '#', '<i class=\"layui-icon layui-icon-home\"></i>', 0, 9, 1, 1550740877),
(2, '控制中心', 'index/ControlCenter', NULL, 1, 0, 1, 1550740877),
(3, '统计中心', 'index/StatisticsCenter', NULL, 1, 0, 1, 1550740877),
(4, '数据中心', 'index/DataCenter', NULL, 1, 0, 1, 1550740877),
(5, '轮播图管理', '#', '<i class=\"layui-icon\">&#xe634;</i>', 0, 0, 1, 123123),
(6, '轮播图列表', 'rotate/index', NULL, 5, 0, 1, 123123),
(7, '用户管理', '#', '<i class=\"layui-icon layui-icon-user\"></i>', 0, 0, 1, 1550740877),
(8, '用户列表', 'member/index', NULL, 7, 0, 1, 1550740877),
(9, '用户组列表', 'group/index', NULL, 7, 0, 1, 123123),
(17, '网站设置', '#', '<i class=\"layui-icon\">&#xe614;</i>', 0, 0, 1, 1550740877),
(18, '网站信息', 'setting/index', NULL, 17, 0, 1, 1550740877);

-- --------------------------------------------------------

--
-- 表的结构 `xin_rotate`
--

CREATE TABLE `xin_rotate` (
  `rotate_id` int(11) NOT NULL,
  `rotate_img` varchar(500) NOT NULL COMMENT '轮播图图片',
  `rotate_desc` varchar(200) NOT NULL COMMENT '轮播图说明',
  `rotate_address` varchar(200) DEFAULT NULL COMMENT '轮播图展示位置',
  `rotate_href` varchar(200) NOT NULL COMMENT '跳转链接',
  `rotate_rank` tinyint(4) NOT NULL DEFAULT '0' COMMENT '轮播图权重',
  `rotate_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '轮播图状态',
  `rotate_time` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xin_rotate`
--

INSERT INTO `xin_rotate` (`rotate_id`, `rotate_img`, `rotate_desc`, `rotate_address`, `rotate_href`, `rotate_rank`, `rotate_status`, `rotate_time`) VALUES
(1, '/uploads/20190709/74933cf37baa6fb61f61f1911f7dec6c.jpg', '这是描述', NULL, 'https://www.baidu.com', 1, 1, 1562652586);

--
-- 转储表的索引
--

--
-- 表的索引 `xin_config`
--
ALTER TABLE `xin_config`
  ADD PRIMARY KEY (`config_id`);

--
-- 表的索引 `xin_group`
--
ALTER TABLE `xin_group`
  ADD PRIMARY KEY (`group_id`);

--
-- 表的索引 `xin_member`
--
ALTER TABLE `xin_member`
  ADD PRIMARY KEY (`member_id`);

--
-- 表的索引 `xin_menu`
--
ALTER TABLE `xin_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- 表的索引 `xin_rotate`
--
ALTER TABLE `xin_rotate`
  ADD PRIMARY KEY (`rotate_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `xin_config`
--
ALTER TABLE `xin_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `xin_group`
--
ALTER TABLE `xin_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `xin_member`
--
ALTER TABLE `xin_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `xin_menu`
--
ALTER TABLE `xin_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `xin_rotate`
--
ALTER TABLE `xin_rotate`
  MODIFY `rotate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
