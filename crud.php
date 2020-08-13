<?php 
include_once "connexion.php";
$object = new Connexion();
$connexion = $object->Connect();

$noteName = (isset($_POST["name"])) ? $_POST["name"]: "";
$noteDescription = (isset($_POST["description"])) ? $_POST["description"]: "";
$option = (isset($_POST["option"])) ? $_POST["option"]: "";
$id = (isset($_POST["id"])) ? $_POST["id"]: "";

switch($option){
    case 1:
        $query = "INSERT INTO notesphp(note_name, note_description) VALUES ('$noteName', '$noteDescription')";
        $res = $connexion->prepare($query);
        $res->execute();

        $query = "SELECT id, note_name, note_description FROM notesphp ORDER BY id DESC LIMIT 1";
        $res = $connexion->prepare($query);
        $res->execute();
        $data = $res->fetchALL(PDO::FETCH_ASSOC);
        break;
    case 2:
        $query = "UPDATE notesphp SET note_name='$noteName', note_description='$noteDescription' WHERE id='$id' ";
        $res = $connexion->prepare($query);
        $res->execute();

        $query = "SELECT id, note_name, note_description FROM notesphp WHERE id='$id'";
        $res = $connexion->prepare($query);
        $res->execute();
        $data = $res->fetchALL(PDO::FETCH_ASSOC);
        break;
    case 3:
        $query = "SELECT id, note_name, note_description FROM notesphp WHERE id='$id'";
        $res = $connexion->prepare($query);
        $res->execute();

        $query = "DELETE FROM notesphp WHERE id='$id'";
        $res = $connexion->prepare($query);
        $res->execute();
        break;

    /*default:
        //code....
    break;*/
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$connexion = null;

?>


