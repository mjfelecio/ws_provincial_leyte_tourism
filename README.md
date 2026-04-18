## World Skills Philippines — Provincial Leyte (leyte_tourism)

A quick project I built during the World Skills Philippines provincial competition — this is basically the exact code I typed during the 6‑hour contest (I exported the DB afterward).

Quick facts
- Role: Competitor — gold medallist
- Time: 09:35 → 15:35 (6 hours)
- Status: Works — messy in places, but it’s what I submitted

What’s here
- PHP site with public pages and a simple admin area
- Database dump: leyte_tourism.sql
- Frontend assets: CSS, JS, and lots of images
- Server code: includes/ (auth, db, crud, helpers)
- Templates: navbar/footer partials
- uploads/: sample uploaded images

Project layout (high level)
- assets/ — css, js, images (destinations, festivals, delicacies, seals)
- includes/ — auth.php, db.php, crud.php, helpers.php
- public/ — site pages and admin pages (login, admin CRUD)
- templates/ — navbar/footer
- uploads/ — uploaded media
- leyte_tourism.sql — DB dump

Quick start
1. Import DB:
   - mysql -u <user> -p <database> < leyte_tourism.sql
2. Drop the folder in htdocs.
3. Edit includes/db.php with your DB credentials.
4. Make sure uploads/ and assets/ are readable by the server.
5. Open public/index.php (admin: public/admin/login.php).
