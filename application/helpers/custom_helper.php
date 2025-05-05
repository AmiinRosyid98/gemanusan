<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('formatNomorIndonesia')) {
    function formatNomorIndonesia($nomor) {
        // Hapus semua karakter non-digit
        $cleanNumber = preg_replace('/\D/', '', $nomor);
        
        // Jika sudah diawali dengan 62, langsung return
        if (strpos($cleanNumber, '62') === 0) {
            return $cleanNumber;
        }
        
        // Jika diawali dengan 0, ubah menjadi 62
        if (strpos($cleanNumber, '0') === 0) {
            return '62' . substr($cleanNumber, 1);
        }
        
        // Jika format tidak sesuai, kembalikan nomor asli
        return $cleanNumber;
    }
}

if(!function_exists('convertToEmbed')){
    function convertToEmbed($link) {
        if (strpos($link, "watch?v=") !== false) {
            return str_replace("watch?v=", "embed/", $link);
        }
        return $link; // fallback
    }
}

if(!function_exists('convertToEmbed_maps')){
    function convertToEmbed_maps($link) {
        if (strpos($link, 'https://www.google.com/maps/embed?') !== false) {
            return str_replace('width="600" height="450"', 'width="100%" height="280"', $link);
        }
        return "Tampilan Maps Tidak Tersedia"; // fallback
    }
}
