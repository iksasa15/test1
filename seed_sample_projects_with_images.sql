-- مشاريع نموذجية مع صور عبر روابط HTTPS (تعمل بعد تفعيل helpers.php في الواجهات)
-- التنفيذ: من phpMyAdmin أو `railway connect MySQL < seed_sample_projects_with_images.sql`

INSERT INTO `projects` (`title`, `description`, `department`, `grad_year`, `tech_stack`, `project_poster`, `project_poster_pdf`, `image_url`, `pdf_file`) VALUES
(
  'نظام إدارة المختبرات الذكي',
  'أتمتة حجوزات المختبرات ومتابعة الأجهزة عبر لوحة تحكم ويب مع تقارير استخدام.',
  'علوم حاسوب',
  2026,
  'PHP, MySQL, JavaScript',
  'https://picsum.photos/id/48/600/850',
  NULL,
  'https://picsum.photos/id/48/800/500',
  NULL
),
(
  'تطبيق تتبع المخزون الصيدلاني',
  'واجهة لأرشفة الأدوية مع تنبيهات انتهاء الصلاحية وتقارير شهرية للمشرف.',
  'هندسة برمجيات',
  2025,
  'PHP, MySQL, Tailwind CSS',
  'https://picsum.photos/id/96/600/800',
  NULL,
  'https://picsum.photos/id/96/800/450',
  NULL
),
(
  'بوابة مشاريع التخرج الجامعية',
  'منصة للطلاب لعرض مشاريعهم وربطها بالأقسام الأكاديمية مع بحث وتصفية.',
  'علوم حاسوب',
  2026,
  'HTML, CSS, PHP, MySQL',
  NULL,
  NULL,
  'https://picsum.photos/id/119/800/450',
  NULL
),
(
  'لوحة تحليلات بيانات تعليمية',
  'تجسيد بسيط لإحصائيات التسجيل والأداء باستخدام رسوم تفاعلية.',
  'هندسة برمجيات',
  2025,
  'PHP, MySQL, Chart.js',
  'https://picsum.photos/id/24/640/900',
  NULL,
  'https://picsum.photos/id/24/800/480',
  NULL
);
