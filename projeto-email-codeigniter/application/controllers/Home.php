<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function index() //função index
	{
		$genders = $this->getGenders(); //setar os dados para enviar para a view
		$dados = array(
			'genders' => $genders
		);
		if($this->input->post('email')){ // condição para chamar a função que recebe os dados do formulario
			$this->recebeDados();
		} else {
			echo "Favor inserir um e-mail!";
		}
		$this->load->view('home_view', $dados); // chamada da view com o envio dos dados necessarios
	}

	public function recebeDados() //função que recebe os dados inseridos no formulario
	{
		$data_email = array(
			'nome' => $this->input->post('name'),
			'sobrenome' => $this->input->post('second_name'),
			'email' => $this->input->post('email'),
			'genero' => $this->input->post('gender'),
			'cep' => $this->input->post('cep'),
			'endereco' => $this->input->post('endereco'),
			'uf' => $this->input->post('uf'),
			'cidade' => $this->input->post('cidade'),
			'bairro' => $this->input->post('bairro')
		);
		$this->enviaEmail($data_email); //chamada da função para enviar os e-mails
	}

	public function getGenders() // função para criar array para select do formulario
	{
		$genders = array(
			0 => 'Selecione...',
			1 => 'Masculino',
			2 => 'Feminino',
			3 => 'Não-Binário',
			4 => 'Outro',
			5 => 'Prefiro não responder'
		);

		return $genders;
	}

	public function enviaEmail($dados_email) // função para o envio de e-mail
	{
		$this->load->library('Emails'); //carregamento da library de envio de email
		$data = $dados_email;
		$email = array(1 => $data['email']);  //recebe o e-mail do formulario
		$assunto = 'Cadastro realizado com sucesso'; //define o assunto do e-mail
		$mensagem = "<h2>Parabens!Cadastro efetuado com sucesso</h2><br><br>". //define a mensagem do email
					"<p>Favor verifique os dados cadastrados:</p><br><br>".
					"<p><b>Nome:</b>".$data['nome']." ".$data['sobrenome']."</p><br>".
					"<p><b>E-mail:</b>".$data['email']."</p><br>".
					"<p><b>Gênero:</b>".$data['genero']."</p><br>".
					"<p><b>Endereço:</b>".$data['cep']." - ".$data['endereco'].", ".$data['bairro'].", ".$data['cidade']." - ".$data['uf']."</p>";

		if($this->emails->enviar($assunto, $mensagem, $email)){ //condição para retornar erro no envio de email caso ocorra + chamada 
			echo "Cadastro realizado com sucesso!Favor verificar sua caixa de e-mail";
		} else {
			echo "Ocorreu um erro";
		}
	}
}
