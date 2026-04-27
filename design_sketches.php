<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سكِتشات ومخططات الصفحات | منصة المشاريع</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .sk-body {
            min-height: 100vh;
            background: linear-gradient(165deg, #eef2ff 0%, #f8fafc 35%, #ffffff 100%);
        }
        .sk-wrap {
            max-width: 920px;
            margin: 0 auto;
            padding: 28px 18px 72px;
        }
        .sk-top {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }
        .sk-badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: #4f46e5;
            background: #e0e7ff;
            padding: 6px 14px;
            border-radius: 999px;
        }
        .sk-title {
            font-size: clamp(1.5rem, 4vw, 2rem);
            color: #0f172a;
            margin: 0 0 8px;
            line-height: 1.3;
        }
        .sk-lead {
            color: #475569;
            max-width: 640px;
            line-height: 1.7;
            margin: 0;
        }
        .sk-btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 999px;
            background: #fff;
            border: 2px solid #c7d2fe;
            color: #4338ca !important;
            text-decoration: none !important;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(67, 56, 202, 0.08);
        }
        .sk-btn-back:hover {
            border-color: #4f46e5;
            background: #f5f3ff;
        }
        .sk-card {
            background: #fff;
            border-radius: 16px;
            padding: 22px 22px 20px;
            margin-bottom: 22px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06);
        }
        .sk-card h2 {
            margin: 0 0 14px;
            font-size: 1.15rem;
            color: #1e293b;
            padding-bottom: 10px;
            border-bottom: 3px solid #4A6CF7;
        }
        .sk-card h3 {
            margin: 18px 0 10px;
            font-size: 1rem;
            color: #334155;
        }
        .sk-legend {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .sk-legend th,
        .sk-legend td {
            border: 1px solid #e2e8f0;
            padding: 10px 12px;
            text-align: right;
        }
        .sk-legend th {
            background: #f1f5f9;
            color: #0f172a;
        }
        .sk-pre {
            background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
            color: #e2e8f0;
            font-family: ui-monospace, "Cascadia Code", "Fira Code", monospace;
            font-size: 11px;
            line-height: 1.4;
            padding: 18px;
            border-radius: 14px;
            overflow-x: auto;
            direction: ltr;
            text-align: left;
            border: 1px solid #334155;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }
        .mermaid {
            background: #fafafa;
            border-radius: 14px;
            padding: 16px;
            margin: 12px 0;
            border: 1px solid #e2e8f0;
        }
        .sk-foot {
            text-align: center;
            color: #64748b;
            font-size: 0.85rem;
            margin-top: 36px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/mermaid@10.6.1/dist/mermaid.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            mermaid.initialize({
                startOnLoad: true,
                theme: 'base',
                securityLevel: 'loose',
                flowchart: { useMaxWidth: true, htmlLabels: true },
                themeVariables: {
                    primaryColor: '#e0e7ff',
                    primaryTextColor: '#1e1b4b',
                    primaryBorderColor: '#6366f1',
                    lineColor: '#64748b',
                    secondaryColor: '#f1f5f9',
                    tertiaryColor: '#fff'
                }
            });
        });
    </script>
</head>
<body class="sk-body">
    <div class="sk-wrap">
        <div class="sk-top">
            <div>
                <span class="sk-badge">وثيقة واجهة</span>
                <h1 class="sk-title">سكِتشات ومخططات الصفحات</h1>
                <p class="sk-lead">
                    تمثيل هيكلي لأهم الشاشات (wireframes نصية) ومخططات تدفّق تفاعلية.
                    للتفاصيل الكاملة راجع الملف <code style="background:#e2e8f0;padding:2px 8px;border-radius:6px;">PAGE-SKETCHES.md</code> في المستودع.
                </p>
            </div>
            <a class="sk-btn-back" href="index.php">← العودة للرئيسية</a>
        </div>

        <div class="sk-card">
            <h2>مفتاح قراءة السكِتشات</h2>
            <table class="sk-legend">
                <thead>
                    <tr><th>الرمز</th><th>المعنى</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>[_______]</code></td><td>حقل إدخال</td></tr>
                    <tr><td><code>┌ ─ │ └ ┘</code></td><td>حدود منطقة</td></tr>
                    <tr><td><code>...</code></td><td>تكرار عناصر</td></tr>
                </tbody>
            </table>
        </div>

        <div class="sk-card">
            <h2>خريطة الموقع</h2>
            <div class="mermaid">
flowchart TB
    subgraph pub [صفحات عامة]
        IDX[index.php]
        DET[project_details]
        REG[register]
        LNU[login_user]
        LNA[login_admin]
    end
    subgraph stu [طالب]
        PRF[profile]
        OUT[logout]
    end
    subgraph adm [إدارة]
        ADM[admin]
        ADD[add_project]
        MNP[manage_projects]
        EDT[edit_project]
        MNS[manage_students]
    end
    IDX --> DET
    IDX --> REG
    IDX --> LNU
    IDX --> LNA
    LNU --> PRF
    PRF --> OUT
    OUT --> IDX
    LNA --> ADM
    ADM --> ADD
    ADM --> MNP
    ADM --> MNS
    MNP --> EDT
            </div>
        </div>

        <div class="sk-card">
            <h2>حالات الجلسة</h2>
            <div class="mermaid">
stateDiagram-v2
    [*] --> Guest
    Guest --> Student: دخول طالب
    Guest --> Admin: دخول إدارة
    Student --> Guest: خروج
    Admin --> Guest: خروج
            </div>
        </div>

        <div class="sk-card">
            <h2>سكِتش: الرئيسية <code>index.php</code></h2>
            <pre class="sk-pre">┌────────────────────────────────────────────────────────────────────────────┐
│  [logo]  UT | GradSource          ☰    الرئيسية  [دخول طلاب] [دخول إدارة]   │
├────────────────────────────────────────────────────────────────────────────┤
│  ┌──────────────────────────────┐ ┌─────────────────────────────────────┐ │
│  │ Hero + بحث + قسم            │ │  صورة توضيحية                       │ │
│  └──────────────────────────────┘ └─────────────────────────────────────┘ │
├────────────────────────────────────────────────────────────────────────────┤
│   إحصاءات: مشاريع | طلاب | مميزة+                                         │
├────────────────────────────────────────────────────────────────────────────┤
│   ┌────────┐ ┌────────┐ ┌────────┐   شبكة بطاقات مشاريع                  │
│   │ صورة   │ │ صورة   │ │ صورة   │   [عرض التفاصيل] لكل بطاقة            │
│   └────────┘ └────────┘ └────────┘                                        │
├────────────────────────────────────────────────────────────────────────────┤
│   ترقيم الصفحات   « 1  2  3 »                                              │
├────────────────────────────────────────────────────────────────────────────┤
│   تذييل: عن المنصة | روابط سريعة | تواصل                                  │
└────────────────────────────────────────────────────────────────────────────┘</pre>
        </div>

        <div class="sk-card">
            <h2>سكِتش: تفاصيل مشروع <code>project_details.php</code></h2>
            <pre class="sk-pre">┌────────────────────────────────────────────────────────────────────────────┐
│  أرشيف المشاريع                                    [ الرئيسية ]           │
├────────────────────────────────────────────────────────────────────────────┤
│  عنوان المشروع (H1)    │    القسم · سنة التخرج                            │
├────────────────────────────────────────────────────────────────────────────┤
│  ┌──────────────────────────────────────────────────────────────────────┐ │
│  │                     صورة رئيسية عريضة                               │ │
│  └──────────────────────────────────────────────────────────────────────┘ │
│  ملخص المشروع  │  التقنيات [وسم][وسم]  │  (اختياري) بوستر                │
│  ملفات: [PDF توثيق] [PDF بوستر]                                          │
└────────────────────────────────────────────────────────────────────────────┘</pre>
        </div>

        <div class="sk-card">
            <h2>سكِتش: لوحة الإدارة</h2>
            <pre class="sk-pre">┌───────────────┬────────────────────────────────────────────────────────────┐
│ لوحة التحكم   │  مرحباً بك، مدير النظام                                     │
│ الرئيسية      │  ┌─────────┐ ┌─────────┐ ┌─────────┐  بطاقات أرقام         │
│ إضافة مشروع   │  │مشاريع   │ │ طلاب    │ │ أقسام   │                         │
│ إدارة المشاريع│  └─────────┘ └─────────┘ └─────────┘                         │
│ إدارة الطلاب  │  ┌──────────────────┐ ┌──────────────────┐                │
│ تسجيل الخروج  │  │ Chart حسب القسم  │ │ Chart حسب السنة │                 │
└───────────────┴────────────────────────────────────────────────────────────┘</pre>
        </div>

        <div class="sk-card">
            <h2>طبقات العرض (الرئيسية)</h2>
            <div class="mermaid">
flowchart TB
    A[محتوى الصفحة]
    B[بطاقات وتذييل]
    C[مودال تواصل]
    D[ويدجت دردشة ثابت]
    A --> B --> C --> D
            </div>
        </div>

        <p class="sk-foot">منصة مشاريع التخرج · <?php echo (int) date('Y'); ?> · لا يتطلب هذا العرض تسجيل دخول</p>
    </div>
</body>
</html>
