<?php

    require "Validator.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors=[];
           if (!Validator::string($_POST["category_name"], min: 3, max: 25)) { 
                $errors["category_name"] = "Saturam jābūt ievadītam, bet ne garākam par 25 rakstzīmēm";

            }
             if (empty($errors)) {
            $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
            $params = [
              "category_name" => $_POST["category_name"]
            ];
            $db->query($sql, $params);

           header("Location: /");
            exit();
             }
        }


require "./views/components/categories/create.view.php";