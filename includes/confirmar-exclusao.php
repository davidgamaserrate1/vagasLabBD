<main>
        
    <h2 class="mt-3"> Excluir Vaga </h2>

    <form method="post">
        <div class="form-group">             
        </div> 
            <p>Deseja realmente excluir a vaga? <strong><?=$obVaga->titulo?></strong>?</p>
       

        <div class="form-group class=text-center">
           
            
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
             
        </div> </div>

    </form>

</main>