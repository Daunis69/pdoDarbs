<?php

    require "Validator.php";

    $sql = "SELECT * FROM categories WHERE id = :id";
    $params = ["id" => $_GET['id']];
    $category = $db->query($sql, $params)->fetch();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors=[];
           if (!Validator::string($_POST["category_name"], min: 1, max: 50)) { 
                $errors["category_name"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";

            }
             if (empty($errors)) {
            $sql = "UPDATE categories SET category_name = :category_name WHERE id = :id";
            $params = [
              "category_name" => $_POST["category_name"],
              "id" => $_GET["id"]
            ];
            $db->query($sql, $params);

           header("Location: /");
            exit();
             }
        }
   


require "./views/components/categories/edit.view.php";