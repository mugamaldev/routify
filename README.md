<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Developer-Muhammad%20Gamal-blue" alt="Developer"></a>
<a href="#"><img src="https://img.shields.io/badge/Framework-Laravel%2011-red" alt="Laravel"></a>
<a href="#"><img src="https://img.shields.io/badge/Status-Active-success" alt="Project Status"></a>
<a href="#"><img src="https://img.shields.io/badge/License-MIT-lightgrey" alt="License"></a>
</p>

---

# 🎓 Routify – منصة تعليمية  
**Routify** هو مشروع تعليمي متكامل لتقديم الدورات التدريبية، إدارة المستخدمين، تسجيل الطلاب، ونظام مراجعات وتقييمات احترافي.  
تم تطويره بواسطة **Muhammad Gamal** باستخدام **Laravel**.

---

## 🚀 المزايا الرئيسية  
- إدارة الدورات التدريبية (إنشاء – تعديل – تصنيف).  
- نظام أدوار للمستخدمين (Admin – Instructor – User).  
- تسجيل الطلاب في الدورات ومتابعة تقدمهم.  
- نظام تقييم ومراجعات لكل دورة.  
- ربط سهل بقاعدة بيانات MySQL وMigrations منظمة.  

---

## 🗂 هيكل قاعدة البيانات (Entities)  
- **Users** → Instructor / Student  
- **Courses** → تفاصيل الدورة + ربط بالـ Categories  
- **Enrollment** → ربط المستخدم بالدورات  
- **Reviews** → تقييمات وتعليقات الطلاب  

---

## ⚙️ التثبيت والتشغيل  

```bash
git clone https://github.com/mugamaldev/routify.git
cd routify
composer install
cp .env.example .env
php artisan key:generate
# ضبط إعدادات قاعدة البيانات في .env
php artisan migrate --seed
npm install && npm run dev
php artisan serve
