<?php

include('PDO/conexao.php');

$sth = $pdo->prepare("SELECT TB_FAVORITO.TB_FAVORITO_ID AS Idf,
TB_FAVORITO.TB_FAVORITO_CONDICAO AS Cdf,
TB_FAVORITO.FK_VAGA AS Fkv,
TB_FAVORITO.FK_PROFESSOR AS Fkp,
TB_VAGA.TB_VAGA_ID AS Idv,
TB_VAGA.TB_VAGA_MATERIA AS Nmv,
TB_PROFESSOR.TB_PROFESSOR_ID AS Idp
FROM `TB_FAVORITO`

INNER JOIN `TB_VAGA` 
ON TB_FAVORITO.FK_VAGA = TB_VAGA.TB_VAGA_ID

INNER JOIN `TB_PROFESSOR` 
ON TB_FAVORITO.FK_PROFESSOR = TB_PROFESSOR.TB_PROFESSOR_ID

WHERE TB_FAVORITO.TB_FAVORITO_CONDICAO LIKE '1'");

$sth->execute();

$favoritos = $sth->fetchAll(PDO::FETCH_ASSOC);