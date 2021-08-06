<?php 

session_start();

?>

    
<script>
    function destruir(){
        <?php 
            session_destroy();
            header("Location: login.php");
        ?>
    }
</script>
