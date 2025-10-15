use notify::{Config, RecommendedWatcher, RecursiveMode, Result, Watcher, Event};
use std::sync::mpsc::channel;
use std::process::Command;
use std::env;
use std::time::{Duration, Instant};
use std::path::{Path, PathBuf};

fn main() -> Result<()> {
    // 🧭 Find the root of the project
    let root = find_project_root().expect("❌ Could not locate PHP Koans root folder");
    env::set_current_dir(&root)?;
    println!("📂 Working in project root: {:?}", env::current_dir()?);

    // 👀 Start watching
    let (tx, rx) = channel();
    let mut watcher = RecommendedWatcher::new(tx, Config::default())?;

    watcher.watch(Path::new("koans"), RecursiveMode::Recursive)?;
    watcher.watch(Path::new("KoansLib"), RecursiveMode::Recursive)?;
    watcher.watch(Path::new("koansSolutions"), RecursiveMode::Recursive)?;
    watcher.watch(Path::new("path_to_enlightenment.php"), RecursiveMode::NonRecursive)?;
    watcher.watch(Path::new("config_koans.txt"), RecursiveMode::NonRecursive)?;

    println!("👀 Watching for changes in /koans /KoansLib /koansSolutions path_to_enlightenment.php config_koans.txt ...\n");

    // Run tests immediately on startup
    clear_screen();
    run_php_koans();

    let mut last_run = Instant::now();

    loop {
        match rx.recv_timeout(Duration::from_secs(1)) {
            Ok(Ok(Event { paths, .. })) => {
                for path in paths {
                    let file_name = path.file_name().and_then(|n| n.to_str());
                    let should_run = if let Some(ext) = path.extension() {
                        ext == "php" || (ext == "txt" && file_name == Some("config_koans.txt"))
                    } else {
                        false
                    };

                    if should_run {
                        if last_run.elapsed() < Duration::from_secs(2) {
                            // 🔁 ignore event that happens too soon after previous run
                            continue;
                        }

                        println!("📄 File changed: {:?}", path);
                        clear_screen();
                        run_php_koans();

                        last_run = Instant::now();
                    }
                }
            }
            Ok(Err(e)) => eprintln!("watch error: {:?}", e),
            Err(_) => {}
        }
    }
}


// ✅ This function recursively walks upward from the binary’s directory until it finds the root of the PHP Koans project
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


fn clear_screen() {
    if cfg!(target_os = "windows") {
        Command::new("cmd")
            .args(&["/C", "cls"])
            .status()
            .ok();
    } else {
        Command::new("clear")
            .status()
            .ok();
    }
}

fn run_php_koans() {
    let result = Command::new("php")
        .arg("path_to_enlightenment.php")
        .status();

    match result {
        Ok(_) => {
            println!("👀 Watching for changes...\n");
        }
        Err(e) => {
            eprintln!("❌ Error running PHP: {:?}\n", e);
        }
    }
}
