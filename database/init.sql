CREATE TABLE `app_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255)  NOT NULL ,
  `avatar` text  DEFAULT NULL,
  `openid` varchar(255)  NOT NULL,
  `status` tinyint(1) unsigned NOT NULL comment "状态：0.正常，1.已购买,2.已删除",
  `created_time` int(10) unsigned NOT NULL ,
  `updated_time` int(10) unsigned NOT NULL ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_openid_unique` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE `app_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` bigint  NOT NULL comment '订单金额',
  `goods_id` bigint  NOT NULL comment 'goodsId',
  `uid` bigint  NOT NULL comment '用户id',
  `status` tinyint(1) unsigned NOT NULL comment "状态：0.待付款，1.已付款，2.已退款",
  `created_time` int(10) unsigned NOT NULL ,
  `updated_time` int(10) unsigned NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 comment "订单表";
