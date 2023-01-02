<?php


if(!function_exists('encrypt_ktp')) {
    /**
     * Encrypt KTP and save as file
     *
     * @param string $input
     * @param string $saveLocation
     * @return void
     */
    function encrypt_ktp($input, $saveFileName = 'encrypted_ktp.txt')
    {
        require_once __DIR__ . "/t_encrypt.php";
        $ktp_scan_folder = public_path("images");
        return t_encrypt::setPassword('huehue')
            -> input($input)
            -> saveAsFile($ktp_scan_folder . DIRECTORY_SEPARATOR . $saveFileName);
    }
}

if(!function_exists('decrypt_ktp_show')) {
    /**
     * Decrypt ktp file
     * and return as random string
     *
     * @param [type] $input
     * @return string
     */
    function decrypt_ktp_show($input)
    {
        require_once __DIR__ . "/t_encrypt.php";
        $ktp_scan_folder = public_path("images");
        $file = $ktp_scan_folder . DIRECTORY_SEPARATOR . $input;
        if (!is_file($file)) {
            // die("File KTP tidak ditemukan");
            return "File KTP tidak ditemukan";
        }

        if (!is_txt_file($file)) {
            // die("File KTP tidak valid, silahkan upload ulang");
            return "File KTP tidak valid, silahkan upload ulang";
        }

        return t_encrypt::setPassword('huehue')
            -> encrypted_string($file)
            -> show();
    }
}

if(!function_exists('decrypt_ktp_print')) {
    /**
     * Decrypt ktp file
     * and return as random string
     *
     * @param string $input
     * @return string
     */
    function decrypt_ktp_print($input)
    {
        require_once __DIR__ . "/t_encrypt.php";
        $ktp_scan_folder = public_path("images");
        $file = $ktp_scan_folder . DIRECTORY_SEPARATOR . $input;
        if (!is_file($file)) {
            // die("File KTP tidak ditemukan");
            return "File KTP tidak ditemukan";
        }

        if (!is_txt_file($file)) {
            // die("File KTP tidak valid, silahkan upload ulang");
            return "File KTP tidak valid, silahkan upload ulang";
        }

        echo t_encrypt::setPassword('huehue')
            -> encrypted_string($file)
            -> print();
    }
}

// helper to determine if file is txt file
if (!function_exists('is_txt_file')) {
    function is_txt_file($file)
    {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
        if ($fileExtension == 'txt') {
            return true;
        }

        return false;
    }
}
