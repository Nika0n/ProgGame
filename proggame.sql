-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/11/2024 às 17:44
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `proggame`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID_administrador` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`ID_administrador`, `nome`, `email`, `senha`) VALUES
(3, 'dsadasda', 'nikclindo@gmail.com', '$2y$10$eFe6wyUpCw7cf58M5tV.Ue9u1kZ4HHC6WcQFNbCmXWa0l2LH1WOjq'),
(5, 'ascasascas', 'csacascasc@asdasd', '$2y$10$Row0q2MvbKfZ0TxER78pB.iSNvE0lJPT3hK5yFtZQYlNeUBmOoIsq'),
(6, 'czxczxczxc', 'zx@asdas', '$2y$10$w1NdOfsqSy9AxQkla.CVceQ5k53bccGPeKSeZBZnGVMeJ2z4IFJJO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `desafio`
--

CREATE TABLE `desafio` (
  `ID_desafio` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nivel_de_dificuldade` varchar(50) DEFAULT NULL,
  `solucao` text DEFAULT NULL,
  `fk_id_linguagem` int(11) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `desafio`
--

INSERT INTO `desafio` (`ID_desafio`, `nome`, `descricao`, `nivel_de_dificuldade`, `solucao`, `fk_id_linguagem`, `pontos`) VALUES
(9, 'Par ou Ímpar', 'Em Python, como faço para verificar se um número é par ou ímpar?', '1', 'if numero % 2 == 0:\n    print(\"Par\")\nelse:\n    print(\"Ímpar\")', 4, 100),
(10, 'Maior número', 'Em Python, como faço um programa que encontre o maior número em uma lista numeros = [4, 1, 9, 6, 3]?', '1', 'maior = max(numeros)\nprint(maior)', 4, 100),
(11, 'Números maiores que 5', 'Em Python, como faço para contar quantos números em uma lista numeros = [1, 6, 8, 3, 10] são maiores que 5?', '1', 'contador = 0\nfor numero in numeros:\n    if numero > 5:\n        contador += 1\nprint(contador)', 4, 100),
(12, 'Números Pares', 'Monte um código que mostre apenas os números pares de 1 a 100', '2', 'for i in range(1, 101):\n    if i % 2 == 0:\n        print(i)', 4, 150),
(13, 'Soma de Números', 'Monte um código que some os números em uma lista', '2', 'numeros = [1, 2, 3, 4, 5]\nsoma = 0\nfor num in numeros:\n    soma += num\nprint(soma)', 4, 150),
(14, 'Contagem de Vogais', 'Monte um código que conte a quantidade de vogais em uma string', '2', 'texto = \"Digite seu texto aqui\"\ncontagem = 0\nfor char in texto:\n    if char in \"aeiouAEIOU\":\n        contagem += 1\nprint(\"Quantidade de vogais:\", contagem)', 4, 150),
(15, 'Contar Números Ímpares', 'Complete a lacuna com o comando correto para contar e imprimir os números ímpares de 1 a 50.', '1', 'for i in range(1, 51):\n    if i % 2 != 0:\n        print(i)', 4, 100),
(16, 'Calcular Média de Notas', 'Complete a lacuna com o comando correto para calcular a média de uma lista de notas.', '1', 'notas = [7, 8, 9, 6]\nmedia = sum(notas) / len(notas)\nprint(\"A média é:\", media)', 4, 100),
(17, 'Classificar Números', 'Complete a lacuna com o comando correto para classificar uma lista de números em ordem crescente.', '1', 'numeros = [5, 2, 9, 1]\nnumeros.sort()\nprint(numeros)', 4, 100);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolhe_linguagem`
--

CREATE TABLE `escolhe_linguagem` (
  `FK_Usuario_Perfil_ID_usu` int(11) NOT NULL,
  `FK_Linguagem_de_Programacao_ID_linguagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `linguagem_de_programacao`
--

CREATE TABLE `linguagem_de_programacao` (
  `ID_linguagem` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `linguagem_de_programacao`
--

INSERT INTO `linguagem_de_programacao` (`ID_linguagem`, `nome`) VALUES
(4, 'Python');

-- --------------------------------------------------------

--
-- Estrutura para tabela `progresso`
--

CREATE TABLE `progresso` (
  `ID_progresso` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_desafio` int(11) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `ID_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `interesses` text DEFAULT NULL,
  `nivel_de_conhecimento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`ID_usuario`, `nome`, `email`, `senha`, `foto`, `interesses`, `nivel_de_conhecimento`) VALUES
(16, 'Níkollas Garcia Moralles', 'nikclindo@gmail.com', '$2y$10$9xpFoSXCgPsingChcLg32.rt6uJc5XKg799iAcw5kfQS3tYnk50Oq', NULL, NULL, '101');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_administrador`);

--
-- Índices de tabela `desafio`
--
ALTER TABLE `desafio`
  ADD PRIMARY KEY (`ID_desafio`),
  ADD KEY `fk_linguagem` (`fk_id_linguagem`);

--
-- Índices de tabela `escolhe_linguagem`
--
ALTER TABLE `escolhe_linguagem`
  ADD PRIMARY KEY (`FK_Usuario_Perfil_ID_usu`,`FK_Linguagem_de_Programacao_ID_linguagem`),
  ADD KEY `FK_Linguagem_de_Programacao_ID_linguagem` (`FK_Linguagem_de_Programacao_ID_linguagem`);

--
-- Índices de tabela `linguagem_de_programacao`
--
ALTER TABLE `linguagem_de_programacao`
  ADD PRIMARY KEY (`ID_linguagem`);

--
-- Índices de tabela `progresso`
--
ALTER TABLE `progresso`
  ADD PRIMARY KEY (`ID_progresso`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_desafio` (`ID_desafio`);

--
-- Índices de tabela `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `desafio`
--
ALTER TABLE `desafio`
  MODIFY `ID_desafio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `linguagem_de_programacao`
--
ALTER TABLE `linguagem_de_programacao`
  MODIFY `ID_linguagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `progresso`
--
ALTER TABLE `progresso`
  MODIFY `ID_progresso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `desafio`
--
ALTER TABLE `desafio`
  ADD CONSTRAINT `fk_linguagem` FOREIGN KEY (`fk_id_linguagem`) REFERENCES `linguagem_de_programacao` (`ID_linguagem`);

--
-- Restrições para tabelas `escolhe_linguagem`
--
ALTER TABLE `escolhe_linguagem`
  ADD CONSTRAINT `escolhe_linguagem_ibfk_1` FOREIGN KEY (`FK_Usuario_Perfil_ID_usu`) REFERENCES `usuario_perfil` (`ID_usuario`),
  ADD CONSTRAINT `escolhe_linguagem_ibfk_2` FOREIGN KEY (`FK_Linguagem_de_Programacao_ID_linguagem`) REFERENCES `linguagem_de_programacao` (`ID_linguagem`);

--
-- Restrições para tabelas `progresso`
--
ALTER TABLE `progresso`
  ADD CONSTRAINT `progresso_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario_perfil` (`ID_usuario`),
  ADD CONSTRAINT `progresso_ibfk_2` FOREIGN KEY (`ID_desafio`) REFERENCES `desafio` (`ID_desafio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
