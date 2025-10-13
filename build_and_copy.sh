cd php_koan_watcher_rust
cargo build --release --target x86_64-unknown-linux-musl
cp target/release/watcher ../watcher
