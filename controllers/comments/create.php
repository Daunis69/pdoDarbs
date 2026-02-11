<?php

    require "Validator.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors=[];
           if (!Validator::string($_POST["coment"], min: 1, max: 500)) { 
                $errors["coment"] = "Saturam jābūt ievadītam, bet ne garākam par 500 rakstzīmēm";
            }
           
           if (!isset($_POST["postid"]) || !is_numeric($_POST["postid"])) {
                $errors["postid"] = "Lūdzu, norādiet ierakstu";
            }

             if (empty($errors)) {
            $sql = "INSERT INTO coments (coment, postdate, postid, author) VALUES (:coment, NOW(), :postid, :author)";
            $params = [
              "coment" => $_POST["coment"],
              "postid" => (int)$_POST["postid"],
              "author" => $_POST["author"] ?? ""
            ];
            $db->query($sql, $params);

           header("Location: /");
            exit();
             }
        }


require "./views/components/comments/create.view.php";
