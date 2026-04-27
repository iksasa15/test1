<?php

/**
 * هل القيمة المخزّنة في قاعدة البيانات رابطًا كاملاً (صورة/ملف خارجي)؟
 */
function project_is_remote_url(?string $stored): bool
{
    return (bool) preg_match('#^https?://#i', trim((string) $stored));
}

/**
 * مسار أو رابط مناسب لعرض في src/href: رابط كامل كما هو، أو ملف تحت uploads/
 */
function project_public_src(?string $stored, string $uploadsFallbackFilename = 'placeholder.jpg'): string
{
    $stored = trim((string) $stored);
    if ($stored === '' || $stored === 'default.jpg') {
        return 'uploads/' . ltrim($uploadsFallbackFilename, '/');
    }
    if (project_is_remote_url($stored)) {
        return $stored;
    }

    return 'uploads/' . ltrim($stored, '/');
}

/**
 * صورة بطاقة المشروع في القوائم (رابط خارجي أو uploads أو placeholder)
 */
function project_card_image_src(?string $image_url): string
{
    $image_url = trim((string) $image_url);
    if ($image_url === '' || $image_url === 'default.jpg') {
        return 'https://via.placeholder.com/400x200?text=بدون+صورة';
    }
    if (project_is_remote_url($image_url)) {
        return $image_url;
    }

    return 'uploads/' . ltrim($image_url, '/');
}

/** رابط ملف PDF: رابط كامل أو uploads/documents/ */
function project_document_href(?string $stored): string
{
    $stored = trim((string) $stored);
    if ($stored === '') {
        return '#';
    }
    if (project_is_remote_url($stored)) {
        return $stored;
    }

    return 'uploads/documents/' . ltrim($stored, '/');
}
