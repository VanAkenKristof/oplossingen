<?php 

session_start();

if (isset($_POST['titel'])){
	$titel = $_POST['titel'];
}

if (isset($_POST['artikel'])){
	$artikel = $_POST['artikel'];
}

if (isset($_POST['kernwoorden'])){
	$kernwoorden = $_POST['kernwoorden'];
}

if (isset($_POST['datum'])){
	$datum = $_POST['datum'];
}

if (isset($_GET['key'])) {
	$key = $_GET['key'];
}


try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}

// Update

        try
	{
                $db->beginTransaction ();    
                    
                $sql  = "UPDATE `artikels` SET `titel` = :titel, `artikel` = :artikel, `kernwoorden` = :kernwoorden , `datum` = :datum ";
                $sql .= "WHERE `ID` = :id";

                $stmt = $db->prepare ($sql);
                $stmt->bindParam (':titel', $titel, PDO::PARAM_STR);
                $stmt->bindParam (':artikel', $artikel, PDO::PARAM_STR);
                $stmt->bindParam (':kernwoorden', $kernwoorden, PDO::PARAM_STR);
                $stmt->bindParam (':datum', $datum, PDO::PARAM_STR);
                $stmt->bindParam (':id', $key, PDO::PARAM_INT);
                $stmt->execute ();
		
                $db->commit ();
                
		header('Location: ../artikel-overzicht.php');

	}

	catch ( PDOException $e )
	{
            
            try
            {
                    $objDB->rollBack();
            }
            catch (PDOException $e2) {
            }
            
            $messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
            echo $messageContainer;								
        }        
?>