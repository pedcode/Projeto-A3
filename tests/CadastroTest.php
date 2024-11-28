<?php

use PHPUnit\Framework\TestCase;

class CadastroTest extends TestCase
{
    // Teste de cadastro válido
    public function testCadastroValido()
    {
        $nome = "Pedro Teste";
        $email = "pedro@example.com";
        $senha = "senha123";
        $cpf = "12345678900";
        $telefone = "11987654321";

        // Simula o cadastro do usuário
        $resultado = cadastrarUsuario($nome, $email, $senha, $cpf, $telefone);

        // Verifica se o usuário foi cadastrado com sucesso
        $this->assertTrue($resultado);
    }

    // Outros testes permanecem os mesmos
}


    // Teste de cadastro inválido com email repetido
    public function testCadastroEmailRepetido()
    {
        $nome = "Maria Teste";
        $email = "pedro@example.com";  // Email já cadastrado no banco
        $senha = "senha123";
        $cpf = "98765432100";
        $telefone = "11987654321";

        // Simula o cadastro do usuário
        require_once 'cadastro.php';
        $resultado = cadastrarUsuario($nome, $email, $senha, $cpf, $telefone);

        // Verifica se o cadastro falhou devido ao email repetido
        $this->assertFalse($resultado);
    }

    // Teste de cadastro com campos vazios
    public function testCadastroCamposVazios()
    {
        $nome = "";
        $email = "";
        $senha = "";
        $cpf = "";
        $telefone = "";

        // Simula o cadastro do usuário
        require_once 'cadastro.php';
        $resultado = cadastrarUsuario($nome, $email, $senha, $cpf, $telefone);

        // Verifica se o cadastro falhou devido aos campos vazios
        $this->assertFalse($resultado);
    }
}
