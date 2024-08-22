<?php

require_once 'vendor/src/GoogleTranslate.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

function translateText($text, $sourceLang, $targetLang) {
    try {
        $tr = new GoogleTranslate(); // Dịch từ ngôn ngữ tự động phát hiện
        $tr->setSource($sourceLang); // Đặt ngôn ngữ nguồn
        $tr->setTarget($targetLang); // Đặt ngôn ngữ đích
        return $tr->translate($text); // Trả về văn bản dịch
    } catch (Exception $e) {
        return 'Translation failed: ' . $e->getMessage();
    }
}

// Sử dụng hàm để dịch văn bản
$textToTranslate = "Hello, how are you?";
$sourceLanguage = 'en'; // Mã ngôn ngữ nguồn (tiếng Anh)
$targetLanguage = 'vi'; // Mã ngôn ngữ đích (tiếng Việt)
$translatedText = translateText($textToTranslate, $sourceLanguage, $targetLanguage);

echo "Translated text: $translatedText";

?>
