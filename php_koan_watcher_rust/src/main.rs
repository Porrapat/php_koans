use notify::{Config, RecommendedWatcher, RecursiveMode, Result, Watcher, Event};
use std::sync::mpsc::channel;
use std::process::Command;
use std::env;
use std::time::Duration;
use std::path::{Path, PathBuf};

fn main() -> Result<()> {
    // 🧭 หารากของโปรเจกต์
    let root = find_project_root().expect("❌ Could not locate PHP Koans root folder");
    env::set_current_dir(&root)?;
    println!("📂 Working in project root: {:?}", env::current_dir()?);

    // 👀 Start watching
    let (tx, rx) = channel();
    let mut watcher = RecommendedWatcher::new(tx, Config::default())?;

    watcher.watch(Path::new("koans"), RecursiveMode::Recursive)?;
    println!("👀 Watching for changes in /koans ...");

    loop {
        match rx.recv_timeout(Duration::from_secs(1)) {
            Ok(Ok(Event { paths, .. })) => {
                for path in paths {
                    if let Some(ext) = path.extension() {
                        if ext == "php" {
                            println!("📄 File changed: {:?}", path);
                            run_php_koans();
                        }
                    }
                }
            }
            Ok(Err(e)) => eprintln!("watch error: {:?}", e),
            Err(_) => {} // timeout
        }
    }
}


// ✅ ฟังก์ชันนี้จะไล่ย้อนจาก binary จนเจอ root ของ PHP Koans
fn find_project_root() -> Option<PathBuf> {
    let mut path = env::current_exe().ok()?;

    for _ in 0..6 {
        path = path.parent()?.to_path_buf();

        let has_enlightenment = path.join("path_to_enlightenment.php").is_file();
        let has_koans = path.join("koans").is_dir();

        if has_enlightenment && has_koans {
            return Some(path);
        }
    }

    None
}


fn run_php_koans() {
    let status = Command::new("php")
        .arg("path_to_enlightenment.php")
        .status()
        .expect("❌ Failed to run php");

    if status.success() {
        println!("Watching Koans...\n");
    } else {
        println!("Watching Koans... FAILED\n");
    }
}
