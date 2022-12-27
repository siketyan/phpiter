# 🐘🦀 phpiter
Strictly typed iterator for Rust lovers in PHP.

## 🏗 Prerequisites
- PHP 8.1+
- PHPStan 1.9+

## 📦 Installation
```shell
composer require siketyan/phpiter
```

## 💚 Examples
### Simple mapping
```php
use function Siketyan\PhpIter\iter;

iter([1, 2, 3, 4, 5])
    ->map(fn ($value) => $value * 10)
    ->toArray();
// -> [10, 20, 30, 40, 50]
```

## ✅ TODO
- [x] all (every)
- [x] any (some)
- [ ] chain
- [ ] cloned
- [x] collect
- [x] count
- [ ] cycle
- [x] enumerate
- [ ] eq
- [x] filter
- [x] filter_map
- [x] find
- [x] find_map
- [x] flat_map
- [ ] flatten
- [ ] fold
- [x] for_each
- [ ] fuse
- [ ] inspect
- [ ] last
- [x] nth
- [ ] partition
- [ ] peekable
- [ ] position
- [ ] product
- [ ] reduce
- [ ] rev
- [ ] rposition
- [ ] scan
- [ ] size_hint
- [x] skip
- [x] skip_while
- [ ] step_by
- [x] sum
- [x] take
- [x] take_while
- [ ] try_fold
- [ ] try_for_each
- [ ] unzip
- [x] zip
