-- =========================================================================
-- ШПАРГАЛКА: КАК ПРАВИЛЬНО СОЗДАТЬ БАЗУ ДАННЫХ (phpMyAdmin)
-- =========================================================================
-- Ты можешь просто импортировать этот файл в phpMyAdmin на экзамене 
-- (Вкладка Import / Импорт), и он сам создаст идеальную базу данных 
-- со всеми правильными связями и галочками A.I. (Auto Increment).
-- Или просто читай его как подсказку.

-- Создаем базу данных (если её нет)
CREATE DATABASE IF NOT EXISTS `bd_exame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_exame`;

-- --------------------------------------------------------
-- 1. ГЛАВНАЯ ТАБЛИЦА (Например: Ginasio, Carro, Cliente)
-- --------------------------------------------------------
CREATE TABLE `ginasio` (
  -- ОБРАТИ ВНИМАНИЕ НА AUTO_INCREMENT! Это та самая галочка A.I.
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- 2. ВТОРАЯ ТАБЛИЦА (Например: План Тренировок)
-- --------------------------------------------------------
CREATE TABLE `plano_de_treino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao_do_plano` varchar(255) NOT NULL,
  `data_de_criacao` date NOT NULL,
  
  -- ВЫЧИСЛЯЕМОЕ ПОЛЕ (Сумма минут). Обязательно INT, а не DATE!
  -- Ставим DEFAULT 0, чтобы при создании плана там был ноль, а не пустота.
  `duracao_total_estimada` int(11) NOT NULL DEFAULT '0',
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- 3. ПОДЧИНЕННАЯ ТАБЛИЦА (Упражнения, которые привязаны к Плану)
-- --------------------------------------------------------
CREATE TABLE `exercicio_plano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_do_exercicio` varchar(255) NOT NULL,
  `series` int(11) NOT NULL,
  `repeticoes` int(11) NOT NULL,
  `duracao` int(11) NOT NULL, -- Время на одно упражнение
  
  -- Это поле связывает упражнение с планом (Foreign Key)
  `plano_de_treino_id` int(11) NOT NULL,
  
  PRIMARY KEY (`id`),
  
  -- Создаем связь, чтобы при удалении плана удалялись и его упражнения
  KEY `plano_de_treino_id` (`plano_de_treino_id`),
  CONSTRAINT `exercicio_plano_ibfk_1` FOREIGN KEY (`plano_de_treino_id`) REFERENCES `plano_de_treino` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================================
-- ГЛАВНЫЕ ПРАВИЛА:
-- 1. Колонки `id` ВСЕГДА INT, PRIMARY KEY и AUTO_INCREMENT!
-- 2. Внешние ключи (например, plano_id) всегда INT!
-- 3. Колонки, которые суммируются (duracao, valor), всегда INT или FLOAT!
-- 4. Имена колонок здесь должны точь-в-точь совпадать с атрибутами name="" в HTML формах!
-- =========================================================================
