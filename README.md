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
use Siketyan\PhpIter\Iter;

Iter::of([1, 2, 3, 4, 5])
    ->map(fn ($value) => $value * 10)
    ->toArray();
// -> [10, 20, 30, 40, 50]
```

## ✅ TODO
- [x] all
- [x] any
- [x] chain
- [x] cloned
- [x] collect
- [x] count
- [x] cycle
- [x] enumerate
- [x] eq
- [x] filter
- [x] filter_map
- [x] find
- [x] find_map
- [x] flat_map
- [x] flatten
- [x] fold
- [x] for_each
- [x] fuse
- [x] inspect
- [x] last
- [x] nth
- [x] partition
- [x] peekable
- [x] position
- [ ] product
- [ ] reduce
- [ ] rev
- [x] rposition
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
