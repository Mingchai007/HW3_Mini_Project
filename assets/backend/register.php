<?php

    class returnMsg {
        public $status;
        public $msg;
        public $data;
    }
    class Main{


        function returnMsg($status, $msg = null, $data = null){

            $returnMsg = new returnMsg();
            if ($status == 0 ) $returnMsg->status = "error";
            elseif ($status == 1) $returnMsg->status = "success";
            
            $returnMsg->msg = $msg;
            $returnMsg->data = $data;
            $toJson = json_encode($returnMsg);
            echo $toJson;

        
        }

    }



    $isAjax = isset($_GET['ajax']);

    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
    }

    $firstName = trim($_POST['FirstNameInput'] ?? '');
    $lastName  = trim($_POST['LastNameInput'] ?? '');
    $email     = trim($_POST['EmailInput'] ?? '');
    $address   = trim($_POST['AddressInput'] ?? '');
    $country   = $_POST['CountrySelect'] ?? '';
    $zipCode   = trim($_POST['ZIPCodeInput'] ?? '');
    $languages = $_POST['languages'] ?? []; // name="languages[]"
    $gender    = $_POST['gender'] ?? '';
    $education = $_POST['EducationSelect'] ?? '';

    $errors = [];

    if ($firstName === '') {
        $errors[] = "First name is required";
    } elseif (!preg_match('/^[\p{L}\s]+$/u', $firstName)) {
        $errors[] = "First name should only contain letters and spaces";
    }

    if ($lastName === '') {
        $errors[] = "Last name is required";
    } elseif (!preg_match('/^[\p{L}\s]+$/u', $lastName)) {
        $errors[] = "Last name should only contain letters and spaces";
    }

    if ($email === '') {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if ($address === '') {
        $errors[] = "Address is required";
    }

    if ($country === '' || $country === 'select') {
        $errors[] = "Please select a country";
    }

    if ($zipCode === '') {
        $errors[] = "ZIP code is required";
    } elseif (!preg_match('/^\d{5}$/', $zipCode)) {
        $errors[] = "Invalid ZIP code format";
    }

    if ($gender === '') {
        $errors[] = "Please select a gender";
    }

    if ($education === '' || $education === 'select') {
        $errors[] = "Please select an education level";
    }

    if ($isAjax) {
        var_dump($errors);
        if (empty($errors)) {
            // สร้างข้อความสรุป (escape ปลอดภัย)

            $safe = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
            $summary = sprintf(
                "<p><strong>Name:</strong> %s %s</p>
                <p><strong>Email:</strong> %s</p>
                <p><strong>Address:</strong> %s</p>
                <p><strong>Country:</strong> %s</p>
                <p><strong>ZIP Code:</strong> %s</p>
                <p><strong>Languages:</strong> %s</p>
                <p><strong>Gender:</strong> %s</p>
                <p><strong>Education:</strong> %s</p>",
                $safe($firstName), $safe($lastName),
                $safe($email),
                $safe($address),
                $safe($country),
                $safe($zipCode),
                $safe(implode(', ', array_map($safe, $languages))),
                $safe($gender),
                $safe($education)
            );

            echo json_encode([
                'status'  => 'success',
                'message' => 'Registration successful!',
                'data'    => $summary
            ]);
        } else {
            // http_response_code(422); // บอก client ว่าข้อมูลไม่ผ่าน
            echo json_encode(value: [
                'status'  => 'error',
                'message' => 'Please fix the following errors:',
                'errors'  => $errors
            ]);
        }
        exit;
    }
?>