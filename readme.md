# PHP Koans

The **PHP Koans** walk you along the path to enlightenment in order to learn PHP.  
The goal is to learn the PHP language, syntax, structure, and some common functions and libraries.  
We also teach you culture by basing the koans on tests.  
Testing is not just something we pay lip service to, but something we live.  
Testing is essential in your quest to learn and do great things in PHP.

> _This project is inspired by Ruby Koans._

![Introduction](screenshots/introduction.gif)

## 🌐 Available Languages

- 🇺🇸 [English](readme.md)
- 🇹🇭 [ภาษาไทย](readme_th.md)

## Inspiration Repos

The following repositories inspired this project:

- [Ruby Koans](https://github.com/edgecase/ruby_koans)
- [Python Koans](https://github.com/gregmalcolm/python_koans)
- [PHP Koans (by Akoebbe)](https://github.com/akoebbe/php_koans.git)
- [PHP Koans (by IvanSolaDelgado)](https://github.com/540/php_koans.git)
- [Rustlings](https://github.com/rust-lang/rustlings)
- [Rust Koans (by crazymykl)](https://github.com/crazymykl/rust-koans)

---

## Installing PHP

If you do not have **PHP** set up, please visit [php.net](https://www.php.net) for OS-specific installation instructions.  
To run the koans, you need **PHP** installed.

To verify your installation:

### On Unix/Linux/macOS/Windows (from any terminal window):

```bash
php -v
```

### Get Started:

Look at `config_koans.txt` and then uncomment each test. You can start from `AboutAsserts`. These images below shows how to do it.

```bash
git clone https://github.com/Porrapat/php_koans.git
cd php_koans
php path_to_enlightenment.php
```

1. Setup Koans

![img1.png](screenshots/01_installing_php_koans.png)

2. Config Koans

![img2.png](screenshots/c0-config-koans.png)

3. Run Koans

![img3.png](screenshots/03_first_run_koans.png)

4. Do Koans

![img4.png](screenshots/04_fix_things_disrupt_your_mind.png)

5. Review Koans

![img5.png](screenshots/05_run_koans_again.png)

### Other Stuff

**Author**: Porrapat Petchdamrongskul <<porrapat.cpe20@gmail.com>>  
**Powered by**: GeeGee a.k.a ChatGPT 😄  
**Issue Tracker**: [GitHub Issues](https://github.com/Porrapat/php_koans/issues)  
**Requirements**: PHP 7.4.x or later

---

### Other Command To Run Koans

```bash
php artisan test    # Laravel-style
php spark test      # CodeIgniter 4-style
```

### Tips & Tricks – Watching Koans Automatically

Just run this command, it will use Rust built binary to watch /koans /KoansLib /koansSolution path_to_enlightenment.php and config_koans.txt

```bash
./watcher-Windows.exe           # For Windows
./watcher-macOS                 # For macOS
./watcher-Linux                 # For Linux
```

1. Example type ./watcher-Windows.exe

![img1.png](screenshots/x0-watch-start-koans.png)

2. The Koans will refresh automatically when edit the files and saved.

![img2.png](screenshots/x1-watch-koans-win.png)

### About Rust Watcher

I found that Rust is good for write this watcher task. You must install Rust compiler. You can run it by

```bash
cd php_koan_watcher_rust
cargo run
```

### AI Tools Used

I use multiple AI tools:

- **ChatGPT**  
  Used for ideas, inspiration, conceptual discussions, converting koans from others programming language.

- **Claude (via OpenRouter, VSCode + Cline)**  
  Used as the primary coding assistant and generated some document block for Readme.md file.

All outputs from AI tools were reviewed, tested, and manually integrated by me.

### License

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
