# PHP Koans

**PHP Koans** จะพาคุณเดินไปบน "เส้นทางแห่งปัญญา" เพื่อเรียนรู้ภาษา PHP  
เป้าหมายคือการเรียนรู้โครงสร้าง ภาษา ไวยากรณ์ ฟังก์ชัน และไลบรารีที่ใช้บ่อยใน PHP  
เรายังสอดแทรกวัฒนธรรมของนักพัฒนา โดยให้คุณเรียนรู้ผ่านการเขียนเทสต์ (Test)  
ซึ่งการเขียนเทสต์ไม่ใช่แค่สิ่งที่เราพูดถึงลอยๆ แต่เป็นสิ่งที่เราใช้จริงในชีวิตนักพัฒนา  
การเขียนเทสต์คือหัวใจสำคัญในการเรียนรู้และการทำสิ่งที่ยิ่งใหญ่ในโลกของ PHP

> _โปรเจกต์นี้ได้รับแรงบันดาลใจจาก Ruby Koans_

![Introduction](screenshots/introduction.gif)

## 🌐 ภาษาที่มีให้เลือก

- 🇺🇸 [English](readme.md)
- 🇹🇭 [ภาษาไทย](readme_th.md)

## แรงบันดาลใจจากโปรเจกต์ต่าง ๆ

Koans นี้ได้รับแรงบันดาลใจมาจากโปรเจกต์เหล่านี้:

- [Ruby Koans](https://github.com/edgecase/ruby_koans)
- [Python Koans](https://github.com/gregmalcolm/python_koans)
- [PHP Koans (โดยคุณ Akoebbe)](https://github.com/akoebbe/php_koans.git)
- [PHP Koans (โดยคุณ IvanSolaDelgado)](https://github.com/540/php_koans.git)
- [Rustlings](https://github.com/rust-lang/rustlings)
- [Rust Koans (โดยคุณ crazymykl)](https://github.com/crazymykl/rust-koans)

---

## การติดตั้ง PHP

หากคุณยังไม่มี **PHP** ติดตั้งไว้ในเครื่อง  
สามารถเข้าไปดูวิธีติดตั้งสำหรับแต่ละระบบปฏิบัติการได้ที่ [php.net](https://www.php.net)  
เพื่อใช้งาน Koans ได้ คุณต้องติดตั้ง **PHP** ให้เรียบร้อยก่อน

ตรวจสอบว่าเครื่องคุณติดตั้งถูกต้องแล้วหรือยัง:

### บน Unix/Linux/macOS/Windows (ผ่าน terminal หรือ command line ใดก็ได้):

```bash
php -v
```

### เริ่มต้นใช้งาน:

ให้ดูไฟล์ `config_koans.txt` แล้วทำการ uncomment โจทย์แต่ละข้อออก โดยเริ่มจาก `AboutAsserts`  
ภาพด้านล่างจะแสดงวิธีการทำแต่ละขั้นตอน

```bash
git clone https://github.com/Porrapat/php_koans.git
cd php_koans
php path_to_enlightenment.php
```

1. ติดตั้ง Koans

![img1.png](screenshots/01_installing_php_koans.png)

2. ตั้งค่า Koans

![img2.png](screenshots/c0-config-koans.png)

3. รัน Koans

![img3.png](screenshots/03_first_run_koans.png)

4. แก้ Koans

![img4.png](screenshots/04_fix_things_disrupt_your_mind.png)

5. ทบทวน Koans

![img5.png](screenshots/05_run_koans_again.png)


### อื่น ๆ ที่ควรรู้

**ผู้เขียน**: ปรพัฒน์ เพชรดำรงค์สกุล <<porrapat.cpe20@gmail.com>>  
**ขับเคลื่อนโดย**: จีจี้ หรือที่รู้จักกันในชื่อ ChatGPT 😄  
**แจ้งปัญหาได้ที่**: [GitHub Issues](https://github.com/Porrapat/php_koans/issues)  
**ความต้องการของระบบ**: PHP 7.4.x ขึ้นไป

---

### คำสั่งทางเลือกในการรัน Koans

```bash
php artisan test    # Laravel-style
php spark test      # CodeIgniter 4-style
```

### เคล็ดลับ – Watch ดูผล Koans อัตโนมัติ

แค่รันคำสั่งนี้ เบื้องหลังจะใช้ไฟล์ Binary ที่ Built จาก Rust เพื่อ Watch /koans /KoansLib /koansSolution path_to_enlightenment.php และ config_koans.txt

```bash
./watcher-Windows.exe           # For Windows
./watcher-macOS                 # For macOS
./watcher-Linux                 # For Linux
```

1. ตัวอย่างแค่พิมพ์คำสั่ง ./watcher-Windows.exe

![img1.png](screenshots/x0-watch-start-koans.png)

2. Koans ทั้งหมดจะ Refresh อัตโนมัติเมื่อมีการแก้ไฟล์แล้วเซฟ

![img2.png](screenshots/x1-watch-koans-win.png)

### เกี่ยวกับ Rust Watcher

ผมพบว่าภาษา Rust นั้นดีสำหรับเขียน watcher คุณต้องติดตั้ง Rust Compiler ก่อน จากนั้นคุณสามารถรันมันได้ด้วยคำสั่ง

```bash
cd php_koan_watcher_rust
cargo run
```

### AI ที่ใช้

ผมใช้ AI ช่วยเขียนหลายตัว:

- **ChatGPT**  
  สำหรับไอเดีย แรงบันดาลใจ คุยเกี่ยวกับคอนเซ็ปต์ต่างๆ และ แปลง Koans จากภาษาโปรแกรมอื่นๆ เบื้องต้น

- **Claude (ผ่าน OpenRouter, VSCode + Cline)**  
  ใช้เป็นตัว Coding หลัก และ ใช้สร้างบล็อกตัวอย่างสำหรับเอกสารเช่น Readme.md

ผลลัพธ์ทั้งหมดที่เกิดจาก AI ผมต้องรีวิว และ ทดสอบ หรือเขียนเชื่อมต่อด้วยตัวผมเอง

### สัญญาอนุญาต (License)

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)