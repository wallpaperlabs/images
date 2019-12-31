<?php include_once('../view/header.php'); ?>
<?php 

$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Por favor insira o seu email válido.';
            $msgClassk = 'errordiv';
        }else{ 
            $toEmail = 'seuemail@gmail.com'; // Replace with your email
            $emailSubject = 'Mensagem de'.$name;
            $htmlContent = '<h2>Via site do formulário de contato</h2>
                <h4>Nome</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Assunto</h4><p>'.$subject.'</p>
                <h4>Mensagem</h4><p>'.$message.'</p>';
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Sua mensagem é entregue!';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Desculpe, sua mensagem não foi entregue, por favor, tente novamente!';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Por favor preencha todo o formulário';
        $msgClass = 'errordiv';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Contato | CODENULL</title>
<style>
.mainContent {
    width: 35%;
    margin: 2.5em auto;
    background: #fff;
    padding: 2.5em;
}
.contactFrm h4 {
    font-size: 1em;
    color: #252525;
    margin-bottom: 0.5em;
    font-weight: 300;
    letter-spacing: 5px;
}
.contactFrm input[type="text"], .contactFrm input[type="email"] {
    width: 93.5%;
    outline: none;
    font-size: 0.9em;
    padding: .7em 1em;
    border: 1px solid #000;
    -webkit-appearance: none;
    display: block;
    margin-bottom: 1.2em;
}
.contactFrm textarea {
    resize: none;
    width: 93.5%;
    font-size: 0.9em;
    outline: none;
    padding: .6em 1em;
    border: 1px solid #000;
    min-height: 10em;
    -webkit-appearance: none;
}
.contactFrm input[type="submit"] {
    outline: none;
    color: #FFFFFF;
    padding: 0.5em 0;
    font-size: 1em;
    margin: 1em 0 0 0;
    -webkit-appearance: none;
    background: #006faa;
    transition: 0.5s all;
    border: 2px solid #006faa;
    -webkit-transition: 0.5s all;
    transition: 0.5s all;
    -moz-transition: 0.5s all;
    width: 47%;
    cursor: pointer;
}
.contactFrm input[type="submit"]:hover {
    background: none;
    color: #006faa;
}

p.statusMsg{font-size:18px;}
p.succdiv{color: #008000;}
p.errordiv{color:#E80000;}
</style>
</head>
<body>
<div class="mainContent">
    <h2>Contato</h2>
    <div class="contactFrm">
        <?php if(!empty($statusMsg)){ ?>
            <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
        <?php } ?>
        <form action="" method="post">
            <h4>Name</h4>
            <input type="text" name="name" placeholder="Seu nome" required="">
            <h4>Email </h4>
            <input type="email" name="email" placeholder="email@example.com" required="">
            <h4>Subject</h4>
            <input type="text" name="subject" placeholder="Assunto da Mensagem" required="">
            <h4>Message</h4>
            <textarea name="message" placeholder="Sua Mensagem" required=""> </textarea>
            <input type="submit" name="submit" value="Submit">
            <div class="clear"> </div>
        </form>
    </div>
    	<h5><br>
	Isenção de responsabilidade: Todo o conteúdo é protegido por direitos autorais e pertence a seus respectivos proprietários. Nós não enviamos ou hospedamos em nosso servidor.
Todos os arquivos são hospedados pelo proprietário das contas do Google Drive. Não hospedamos nenhum arquivo em nosso servidor!
     Nós altamente appriciate e respeite todos os direitos autorais para os proprietários!
	<br>
    Nossos sites e não é responsável pelo conteúdo do site de terceiros. É ilegal distribuir arquivos protegidos por direitos autorais sem permissão. Os downloads devem ser apenas para uso temporário, não comercial, pessoal e privado.
<br>
</h5>
</div>
</body>
</html>

<?php include_once('../view/footer.php');?>