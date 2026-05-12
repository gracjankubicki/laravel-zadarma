# Release

Versions are published from Git tags.

```bash
gh workflow run release.yml --repo gracjankubicki/laravel-zadarma -f version=v1.0.0 -f prerelease=false
```

The workflow validates the package, creates the Git tag, creates a GitHub Release and lets the configured Packagist GitHub webhook update the Composer package.
