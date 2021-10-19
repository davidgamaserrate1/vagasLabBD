<?php

    namespace App\Db;
    use \PDO;
    use \PDOException;

class DataBase{
       
        /**
         * Host de conexão com Banco de dados
         * @var string
         */
        const HOST = 'localhost';

        /**
         * Nome do banco de Dados
         * @var string
         */
        const NAME = 'vagas';

        /**
         * usuario do banco
         * @var string
         */
        const USER = 'root';
        
        /**
         * senha do banco 
         * @var string
         * */
        const PASS = '';

        /**
         * nome da tabela manipulada
         * @var[type]
         */
        private $table;

        /**
         * instancia de conexão de banco de dados
         * @var PDO 
         */
        private $connection;

        /**
         * Define a tabela, instancia e conexao
         * @param string table
         */
        public function __construct($table){
            $this->table = $table;
            $this->setConnection();
        }
      
        /**
         * Método responsaval por definir uma instancia do PDO
         * e criar uma conexao com o banco de dados
         */
        private function setConnection(){
            try{
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('ERROR '.$e->getMessage());

            }
        }

        /**
         * Método responsável por executar uma queria no banco de dados
         * @param $query
         * @param $params
         * @return PDOStatement
         */
        public function execute($query,$params = []){
            try{
                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement;
            }catch(PDOException $e){
                die('ERROR '.$e->getMessage());

            }
        }

        /**
         * Método responsavel por inserir dados no banco
         * @param array $values [ field => value ]
         * @return integer ID inserido
         */
        public function insert($values){
            //DADOS DA QUERY
            $fields = array_keys($values);    
            $binds = array_pad([],count($fields),'?');
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES('.implode(',',$binds).')';
            
            //EXECUTA O INSERT
            $this->execute($query,array_values($values));
            
            //retorna o ID inserido
            return $this->connection->lastInsertId();
             
        }



        /**
        * Método responsavel por executar uma consulta no banco de dados
        * @param string $where
        * @param string $order
        * @param string $limit
        * @return PDOStatement
        */
        public function select($where = null, $order = null, $limit = null, $fields = '*'){
            //DADOS DA QUERY
            $where = strlen($where) ? 'WHERE '.$where : ''; 
            $order = strlen($order) ? 'ORDER '.$order : ''; 
            $limit = strlen($limit) ? 'LIMIT '.$limit : ''; 

            //MONTA A QUERY
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit ;
            
            //EXECUTA A QUERY
            return $this->execute($query);

        }
        /**
         * Método responsavel por atualizar Vagas no banco de Dados
         * @param string $where
         * @param array $values [field => value]
         * @return boolean 
         */
              

    //RETORNA SUCESSO
 
    public function update($where,$values){
    //DADOS DA QUERY
        $fields = array_keys($values);

    //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

    //RETORNA STATUS
        return true;
  }

  /**
   * @param string $where
   * @return boolean
   */
    public function delete ($where){
        //MONTA QUERY
        $query = 'DELETE FROM '.$this->table. ' WHERE '.$where;

        //EXECUTA QUERY
        $this->execute($query);
        //RETORNA STATUS
        return true;
    }

}
    