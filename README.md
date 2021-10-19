# SISTEMA DE VAGAS COM PHP ORIENTADO A OBJETOS, PDO E MYSQL
  implementação de um CRUD com PHP OO, PDO e MySQL  

## PASSOS PARA EXECUTAR A APLICAÇÃO :
  - CRIAR O BANCO vagas : 
  ```  
    
     CREATE TABLE `vagas` (
  	`id` INT(11) NOT NULL AUTO_INCREMENT,
  	`titulo` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  	`descricao` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
  	`ativo` ENUM('s','n') NOT NULL COLLATE 'utf8_general_ci',
  	`data` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  	PRIMARY KEY (`id`) USING BTREE
  )
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
  AUTO_INCREMENT=1;
 ``` 

   - CONFIGURAR CONEXÃO 
      
      Alterar as credenciais de conexão (NAME,PASS, USER e HOST) que estão no arquivo  `./app/Db/Database.php` para as configurações do seu ambiente
      
  - INTALAR O COMPOSER 
  
    Para que a aplicação funcione, é necessário executar o Composer .
    Caso não tenha instalado, baixe no site oficial : https://getcomposer.org/download](https://getcomposer.org/download/
    Após ter instalado o Composer em sua máquina, execute o seguinte comando no terminal : 
    `composer install`

    
    
