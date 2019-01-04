<?php
// file size can't be more than 67072 'character' bytes (65.5 kB)
// this is the limit made by codeforces!
const MAX_BYTES_FOR_CODE = 67072;

if ($_SERVER['REQUEST_METHOD'] == 'POST'):

    $destination =  "../source_codes/";

    $text_area_has_code = false;
    $file_has_been_uploaded = false;

    # the submitting process goes like that:
    # if you have both code in the text area and an uploaded file
    # DON'T consider neither!
    # tell the user to "put his source code in the textarea OR choose a file"

    if ($_POST['code']) {
        // if the text area has some code
        if (strlen($_POST['code']) > MAX_BYTES_FOR_CODE) {
            // bigger than permitted size
            $errors_array[] = "Field should contain no more than ". MAX_BYTES_FOR_CODE ." characters";
        } else {
            // valid
            $text_area_has_code = true;
        }
    }
    if ($_FILES['my_file']['error'] == UPLOAD_ERR_OK) {
        // explode(): splits the string according to the delimiter
        // so it will split the file name into two-element array
        // [0] => name , [1] => extension
        $file_extension_arr = explode(".", $_FILES['my_file']['name']);
        $extension = strtolower(end($file_extension_arr));

        // if the file is uploaded successfully (NO ERRORS)
        if ($text_area_has_code) {
            $errors_array[] = "Put source code into the textarea OR choose the sourcecode file!";
        } else {
            if ($_FILES['my_file']['size'] > MAX_BYTES_FOR_CODE) {
                $errors_array[] = "Field should contain no more than ". MAX_BYTES_FOR_CODE ." characters";
            }
            if ($extension != 'cpp') {
                // if the file extension is NOT "cpp"
                $errors_array[] = "File extension must be .cpp (C++ file)";
            }
            if (!$errors_array) {
                $file_has_been_uploaded = true;
            }
        }
    } elseif (!$text_area_has_code) {
        switch ($_FILES['my_file']['error']) {
            case UPLOAD_ERR_NO_FILE:
                $errors_array[] = "NO FILE WAS CHOSEN";
                break;
            default:
                $errors_array[] = "SOMETHING WENT WRONG";
        }
    }


    if ($errors_array) {
        // true if the errors_array has any element(error)!
        print_r($errors_array);
        $code = $_POST['code'];
        return -1;
    }

    // file name is going to be saved in the following format
    // <submission_id>.cpp (get it from the DB) *AUTO INCREMENT*

    require '../back/database_connection.php';
    $conn = get_sql_connection();
    // add submission before judging...
    add_submission_to_database($_POST['problem_id'], $_SESSION['user_id'], "c++", $conn);
    $submission_id = get_last_insert_id($conn);
    $source_code_file_name = "$submission_id.cpp";
    $res = 0;

    if ($file_has_been_uploaded) {
        $res = move_uploaded_file(
            $_FILES['my_file']['tmp_name'],
            $destination . $source_code_file_name
        );
    } elseif ($text_area_has_code) {
        $res = file_put_contents($destination . $source_code_file_name, $_POST['code']);
        // return number of written bytes or FALSE on failure
    }



    if ($res) {
        // res will equal the number of bytes or 1 if uploaded successfully
        require "../judge_tester/tester.php"; // go judge it
        // go test the uploaded file
    } else {
        // res == 0, something went wrong
        change_submission_status($submission_id, "Judge Error", $conn);
    }



endif;
