<?php 
    require_once 'auth.php';

    function connect(){
        return mysqli_connect('localhost', 'root', '','mhw4');
    }

    function shop() {
        $conn = connect();
        $descrizione = $_GET["descrizione"];
        $query = "SELECT id, tipo, immagine, descrizione, prezzo FROM INVENTARIO WHERE descrizione = '$descrizione'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $result=array();
        while($entry = mysqli_fetch_assoc($res)){
        $result[] = array("id"=> $entry["id"], "immagine"=> $entry["immagine"], "descrizione"=> $entry["descrizione"], "prezzo"=> $entry["prezzo"]);
        }

        echo json_encode($result);
        exit;
    }

    function all() {
        $conn = connect();
        $id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
        $query = "SELECT name, surname, username, email FROM users WHERE id = $id";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $res = mysqli_fetch_array($res);

        $result = ["name"=> $res["name"], "surname"=> $res["surname"], "username"=> $res["username"], "email"=> $res["email"]];
        
        echo json_encode($result);
        exit;
    }

    function save() {
        global $id;
        $conn = connect();

        $id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
        $id_contenuto = mysqli_real_escape_string($conn, $_GET["id"]);
        $immagine = mysqli_real_escape_string($conn, $_GET["immagine"]);
        $descrizione = mysqli_real_escape_string($conn, $_GET["descrizione"]);
        $prezzo = mysqli_real_escape_string($conn, $_GET["prezzo"]);

        $query = "SELECT * FROM cart WHERE id = '$id' AND id_contenuto = '$id_contenuto'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
        } else {
            $insertQuery = "INSERT INTO cart (id, id_contenuto, immagine, descrizione, prezzo) VALUES ('$id', '$id_contenuto', '$immagine', '$descrizione', '$prezzo')";
            if (mysqli_query($conn, $insertQuery)) {
                echo json_encode(array('ok' => true));
            } else {
                echo json_encode(array('ok' => false));
            }
        }

        mysqli_close($conn);
        exit;
    }

    function carica(){
        $conn = connect();
        $id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
        $query = "SELECT * FROM cart WHERE id = '$id'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $result=array();
        while($entry = mysqli_fetch_assoc($res)){
            $result[] = array("id"=> $entry["id"], "id_contenuto"=> $entry["id_contenuto"], "immagine"=> $entry["immagine"], "descrizione"=> $entry["descrizione"], "prezzo"=> $entry["prezzo"]);
        }

        echo json_encode($result);
        exit;
    }

    function rimuovi() {
        $conn = connect();
        $id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
        $id_contenuto = mysqli_real_escape_string($conn, $_GET["id_contenuto"]);

        $query = "DELETE FROM cart WHERE id = '$id' AND id_contenuto = '$id_contenuto'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($res) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
        exit;
    }

    function carica_vetrina(){
        $conn = connect();
        $query = "SELECT id, tipo, immagine, descrizione, prezzo FROM INVENTARIO ORDER BY RAND() LIMIT 10";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $result=array();
        while($entry = mysqli_fetch_assoc($res)){
        $result[] = array("id"=> $entry["id"], "immagine"=> $entry["immagine"], "descrizione"=> $entry["descrizione"], "prezzo"=> $entry["prezzo"]);
        }

        echo json_encode($result);
        exit;
    }

    function carica_recensione(){
        global $id;
        $conn = connect();

        $id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
        $id_contenuto = mysqli_real_escape_string($conn, $_GET["id"]);
        $immagine = mysqli_real_escape_string($conn, $_GET["immagine"]);
        $descrizione = mysqli_real_escape_string($conn, $_GET["descrizione"]);
        $prezzo = mysqli_real_escape_string($conn, $_GET["prezzo"]);
        $recensione =  mysqli_real_escape_string($conn, $_GET["recensione"]);

        $query = "INSERT INTO recensioni (id, id_contenuto, immagine, descrizione, prezzo, recensione) VALUES ('$id', '$id_contenuto', '$immagine', '$descrizione', '$prezzo', '$recensione')";
        if (mysqli_query($conn, $query)) {
            echo json_encode(array('ok' => true));
        } else {
            echo json_encode(array('ok' => false));
        }

        mysqli_close($conn);
        exit;
    }

    function scarica_recensione(){
        $conn = connect();
        $id_contenuto = mysqli_real_escape_string($conn, $_GET["id_contenuto"]);
        $query = "SELECT users.username, recensioni.immagine, recensioni.descrizione, recensioni.prezzo, recensioni.recensione
        FROM users
        JOIN recensioni ON users.id = recensioni.id
        WHERE recensioni.id_contenuto = $id_contenuto";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $result=array();
        while($entry = mysqli_fetch_assoc($res)){
        $result[] = array("username"=> $entry["username"], "immagine"=> $entry["immagine"], "descrizione"=> $entry["descrizione"], "prezzo"=> $entry["prezzo"], "recensione"=> $entry["recensione"]);
        }

        echo json_encode($result);
        exit;
    }
?>