--
-- Estrutura da tabela `notify_groups`
--

CREATE TABLE `notify_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estrutura da tabela `notify_group_user`
--

CREATE TABLE `notify_group_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notify_group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;