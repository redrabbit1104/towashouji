use wheatbobcat1_db;
DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (`id` bigint unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT '識別するためのID',
   `email` varchar(256) NOT NULL COMMENT '入力値:email',
   `name` varchar(128) NOT NULL COMMENT '入力値:名前',
   `comment` text NOT NULL COMMENT 'お問い合わせ内容',
   `created` datetime NOT NULL COMMENT '作成日時', -- バージョン的に可能なら DEFAULT CURRENT_TIMESTAMPが使いやすい
   `updated` datetime NOT NULL COMMENT '修正日時' -- バージョン的に可能なら DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMPが使いやすい
) CHARACTER SET 'utf8mb4', ENGINE=InnoDB, COMMENT='1レコードが1入力を意味するテーブル';