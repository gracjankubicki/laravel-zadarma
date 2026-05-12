# Changelog

All notable changes to `laravel-zadarma` will be documented in this file.

## Unreleased

- Added typed accessor layer for DTO payload values.
- Added field-level DTO accessors across documented response DTOs.
- Added typed request parameter enums and value objects with request serialization support.
- Added optional Laravel webhook route, controller, event dispatching and signature verification helpers.
- Added webhook response builders for Zadarma call-control responses.
- Added optional webhook IP allowlist middleware using Zadarma's recommended CIDR range.
- Added per-group endpoint documentation for Info, SMS, PBX, webhooks, CRM, documents and releases.
- Added request payload contract tests for higher-risk endpoint groups.
- Added GitHub Actions release workflow for tagged package versions.
- Initial Laravel package scaffold.
- Saloon-based Zadarma connector and authenticator.
- Pest, Pint, Rector, PHPStan and GitHub Actions setup.
- Endpoint matrix and DTO architecture for the Zadarma API.
- Webhook payload helpers for documented incoming event names.
- Strict Pest coverage target at 100%.
