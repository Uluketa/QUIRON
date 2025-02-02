<?php
session_start();

if (isset($_POST['submit'])) {
    if (
        isset(
            $_POST['nome-p'],
            $_POST['cep-p'],
            $_POST['end-p'],
            $_POST['num-p'],
            $_POST['cidade-p'],
            $_POST['tel-p'],
            $_POST['cpf-p'],
            $_POST['data-p'],
            $_POST['email-p'],
            $_POST['senha-p']
        )

        && !empty($_POST['nome-p'])
        && !empty($_POST['cep-p'])
        && !empty($_POST['end-p'])
        && !empty($_POST['num-p'])
        && !empty($_POST['cidade-p'])
        && !empty($_POST['tel-p'])
        && !empty($_POST['cpf-p'])
        && !empty($_POST['data-p'])
        && !empty($_POST['email-p'])
        && !empty($_POST['senha-p'])
    ) {

        $nome = trim($_POST['nome-p']);
        $cep = trim($_POST['cep-p']);
        $endereco = trim($_POST['end-p']);
        $numero = trim($_POST['num-p']);
        $cidade = trim($_POST['cidade-p']);
        $telefone = trim($_POST['tel-p']);
        $cpf = trim($_POST['cpf-p']);
        $data = trim($_POST['data-p']);
        $email = trim($_POST['email-p']);
        $senha = trim($_POST['senha-p']);
        $textarea = trim($_POST['imagem']);

        $count_email = strlen($email);
        $count_senha = strlen($senha);
        $count_telefone = strlen($telefone);
        $count_cep = strlen($cep);

        list($ano, $mes, $dia) = explode('-', $data);

        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        if ($idade >= 18) {
            if ($count_senha >= 8) {
                if ($count_cep = 8) {
                    if ($count_email > 13) {
                        if ($count_telefone >= 10) {
                            include('verificaCPF.php');
                            if (verifyCPF($cpf) == true) {
                                $cpf_verificacao = 'SELECT * FROM TB_PROFESSOR where TB_PROFESSOR_CPF = :TB_PROFESSOR_CPF';
                                $stmta = $pdo->prepare($cpf_verificacao);
                                $pa = ['TB_PROFESSOR_CPF' => $cpf];
                                $stmta->execute($pa);
                                if ($stmta->rowCount() == 0) {

                                    $options = array("cost" => 4);
                                    $hashsenha = password_hash($senha, PASSWORD_BCRYPT, $options);

                                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        $sql = 'SELECT * FROM TB_PROFESSOR where TB_PROFESSOR_EMAIL = :TB_PROFESSOR_EMAIL';
                                        $stmt = $pdo->prepare($sql);
                                        $p = ['TB_PROFESSOR_EMAIL' => $email];
                                        $stmt->execute($p);

                                        if ($stmt->rowCount() == 0) {
                                            $sql = "INSERT INTO TB_PROFESSOR (TB_PROFESSOR_NOME, TB_PROFESSOR_CEP, TB_PROFESSOR_ENDERECO, TB_PROFESSOR_END_NUM, TB_PROFESSOR_CIDADE, TB_PROFESSOR_TELEFONE, TB_PROFESSOR_CPF,TB_PROFESSOR_NASCIMENTO,TB_PROFESSOR_EMAIL, `TB_PROFESSOR_SENHA`, `TB_PROFESSOR_IMG_USER`) 
                                        values(:TB_PROFESSOR_NOME,:TB_PROFESSOR_CEP,:TB_PROFESSOR_ENDERECO,:TB_PROFESSOR_END_NUM,:TB_PROFESSOR_CIDADE,:TB_PROFESSOR_TELEFONE,:TB_PROFESSOR_CPF,:TB_PROFESSOR_NASCIMENTO,:TB_PROFESSOR_EMAIL,:TB_PROFESSOR_SENHA, :FOTO)";

                                            try {
                                                $handle = $pdo->prepare($sql);
                                                $params = [
                                                    ':TB_PROFESSOR_NOME' => $nome,
                                                    ':TB_PROFESSOR_CEP' => $cep,
                                                    ':TB_PROFESSOR_ENDERECO' => $endereco,
                                                    ':TB_PROFESSOR_END_NUM' => $numero,
                                                    ':TB_PROFESSOR_CIDADE' => $cidade,
                                                    ':TB_PROFESSOR_TELEFONE' => $telefone,
                                                    ':TB_PROFESSOR_CPF' => $cpf,
                                                    ':TB_PROFESSOR_NASCIMENTO' => $data,
                                                    ':TB_PROFESSOR_EMAIL' => $email,
                                                    ':TB_PROFESSOR_SENHA' => $senha,
                                                    ':FOTO' => $textarea
                                                ];

                                                $handle->execute($params);

                                                // $success = 'Cadastrado com sucesso, Bem-vindo a Quíron!';
                                                header('location: ../web/entrar');
                                            } catch (PDOException $e) {
                                                $errors[] = $e->getMessage();
                                            }
                                        } else {
                                            $valnome = $nome;
                                            $valcep = $cep;
                                            $valendereco = $endereco;
                                            $valnumero = $numero;
                                            $valcidade = $cidade;
                                            $valtelefone = $telefone;
                                            $valcpf = $cpf;
                                            $valdata = $data;
                                            $valemail = '';
                                            $valsenha = $senha;

                                            $errors[] = 'Email já cadastrado';
                                        }
                                    } else {
                                        $valnome = $nome;
                                        $valcep = $cep;
                                        $valendereco = $endereco;
                                        $valnumero = $numero;
                                        $valcidade = $cidade;
                                        $valtelefone = $telefone;
                                        $valcpf = $cpf;
                                        $valdata = $data;
                                        $valemail = '';
                                        $valsenha = $senha;
                                        $errors[] = "Endereço de email não é válido";
                                    }
                                } else {
                                    $valnome = $nome;
                                    $valcep = $cep;
                                    $valendereco = $endereco;
                                    $valnumero = $numero;
                                    $valcidade = $cidade;
                                    $valtelefone = $telefone;
                                    $valcpf = '';
                                    $valdata = $data;
                                    $valemail = $email;
                                    $valsenha = $senha;
                                    $errors[] = 'CPF já cadastrado';
                                }
                            } else {
                                $valnome = $nome;
                                $valcep = $cep;
                                $valendereco = $endereco;
                                $valnumero = $numero;
                                $valcidade = $cidade;
                                $valtelefone = $telefone;
                                $valcpf = '';
                                $valdata = $data;
                                $valemail = $email;
                                $valsenha = $senha;
                                $errors[] = 'CPF inválido';
                            }
                        } else {
                            $valnome = $nome;
                            $valcep = $cep;
                            $valendereco = $endereco;
                            $valnumero = $numero;
                            $valcidade = $cidade;
                            $valtelefone = '';
                            $valcpf = $cpf;
                            $valdata = $data;
                            $valemail = $email;
                            $valsenha = $senha;
                            $errors[] = 'Verifique o telefone inserido, não esqueça do DDD!';
                        }
                    } else {
                        $valnome = $nome;
                        $valcep = $cep;
                        $valendereco = $endereco;
                        $valnumero = $numero;
                        $valcidade = $cidade;
                        $valtelefone = $telefone;
                        $valcpf = $cpf;
                        $valdata = $data;
                        $valemail = '';
                        $valsenha = $senha;
                        $errors[] = 'Verifique o email inserido';
                    }
                } else {
                    $errors[] = 'CEP incorreto';
                    $valnome = $nome;
                    $valcep = '';
                    $valendereco = $endereco;
                    $valnumero = $numero;
                    $valcidade = $cidade;
                    $valtelefone = $telefone;
                    $valcpf = $cpf;
                    $valdata = $data;
                    $valemail = $email;
                    $valsenha = $senha;
                }
            } else {
                $valnome = $nome;
                $valcep = $cep;
                $valendereco = $endereco;
                $valnumero = $numero;
                $valcidade = $cidade;
                $valtelefone = $telefone;
                $valcpf = $cpf;
                $valdata = $data;
                $valemail = $email;
                $valsenha = '';
                $errors[] = 'Senha muito curta!';
            }
        } else {
            $valnome = $nome;
            $valcep = $cep;
            $valendereco = $endereco;
            $valnumero = $numero;
            $valcidade = $cidade;
            $valtelefone = $telefone;
            $valcpf = $cpf;
            $valdata = '';
            $valemail = $email;
            $valsenha = $senha;
            $errors[] = 'Somente para maiores de 18 anos';
        }
    } else {
        if (!isset($_POST['nome-p']) || empty($_POST['nome-p'])) {
            $errors[] = 'Por favor insira seu nome';
        } else {
            $valnome = $_POST['nome-p'];
        }
        if (!isset($_POST['cep-p']) || empty($_POST['cep-p'])) {
            $errors[] = 'Por favor insira seu CEP';
        } else {
            $valcep = $_POST['cep-p'];
        }

        if (!isset($_POST['end-p']) || empty($_POST['end-p'])) {
            $errors[] = 'Por favor insira seu endereço';
        } else {
            $valendereco = $_POST['end-p'];
        }

        if (!isset($_POST['num-p']) || empty($_POST['num-p'])) {
            $errors[] = 'Por favor insira o número do seu endereço';
        } else {
            $valnumero = $_POST['num-p'];
        }

        if (!isset($_POST['cidade-p']) || empty($_POST['cidade-p'])) {
            $errors[] = 'Por favor insira sua cidade';
        } else {
            $valcidade = $_POST['cidade-p'];
        }

        if (!isset($_POST['tel-p']) || empty($_POST['tel-p'])) {
            $errors[] = 'Por favor insira seu telefone';
        } else {
            $valnome = $_POST['tel-p'];
        }

        if (!isset($_POST['cpf-p']) || empty($_POST['cpf-p'])) {
            $errors[] = 'Por favor insira seu cpf';
        } else {
            $valcpf = $_POST['cpf-p'];
        }

        if (!isset($_POST['data-p']) || empty($_POST['data-p'])) {
            $errors[] = 'Por favor insira seu nascimento';
        } else {
            $valdata = $_POST['data-p'];
        }

        if (!isset($_POST['email-p']) || empty($_POST['email-p'])) {
            $errors[] = 'Por favor insira seu email';
        } else {
            $valemail = $_POST['email-p'];
        }

        if (!isset($_POST['senha-p']) || empty($_POST['senha-p'])) {
            $errors[] = 'Por favor insira a sua senha';
        } else {
            $valsenha = $_POST['senha-p'];
        }
    }
}
