---
name: modstart-skill
description: ModStart 模块与业务开发技能。包含开发规范、PHP/Blade/Vue 编码标准、自动化测试规范及代码示例索引。当用户进行 ModStart 模块开发、编写控制器/模型/视图、配置模块或运行测试时使用。
---

# 系统介绍与开发规范

在进行 ModStart 模块与业务开发时，必须始终遵循以下规范：

- ⚠️ **语言与沟通**: 始终使用 **简体中文** 与用户交流，指令不清晰时必须**反问澄清**，严禁幻觉。
- ⚠️ **示例驱动开发**: 代码优先在现有实现中找示例（模块下现有的逻辑），不发明新模式，如果无示例必须找用户确认。
- ⚠️ **命令执行**: 执行命令并查看结果时，使用"执行+过滤"方式（如 `cmd 2>&1 | tail -50` 或 `cmd 2>&1 | grep -E "error|warning|done"`），禁止轮询方式反复查看完整日志，避免 Token 消耗过大。禁止后台运行命令再通过 `sleep` 等待轮询（如 `sleep 120 && echo "再次检查..."`），必须同步执行命令等待结果。
- ⚠️ **接口测试**：新增/修改 API 接口，必须同时新增/修改对应的接口测试脚本。

## 开发流程

1. 开发功能（接口、模型、业务逻辑）
2. 语法检查：`php -l <文件路径>`
3. 运行测试：`php artisan modstart:seed-test`

## 自动化测试规范

命令 `php artisan modstart:seed-test` 依次执行三个阶段（均先系统后模块）：
- **Seed**：填充测试数据，需 `AUTO_TEST=true` 才真正写入；文件位于 `test/seed/*.php` / `module/<名称>/Test/Seed/*.php`
- **API**：测试 HTTP 接口；文件位于 `test/api/*.php` / `module/<名称>/Test/Api/*.php`
- **Biz**：测试业务逻辑；文件位于 `test/biz/*.php` / `module/<名称>/Test/Biz/*.php`

测试基础类（`vendor/modstart/modstart/src/Test/`）：`TestContext`、`TestCase`（断言）、`TestSeed`（数据填充）、`TestMember`（登录模拟，提供 `loginAsTest()` / `login($id)` / `logout()`）


## 目录与规范文件索引

开发相关规范已详细拆分，请查阅对应类目文档：

- 📖 **基础规范**: `doc/basic.md`
- 🏗️ **模块开发规范**: `doc/module.md`
- 🐘 **PHP 开发规范 (Controller, Util 等)**: `doc/php.md`
- 🎨 **Blade 开发规范 (SUI, Tailwind等)**: `doc/blade.md`
- ⚛️ **Vue & JavaScript 开发规范**: `doc/vue_js.md`

在开发业务功能、写接口、建模型或写前台视图之前，务必参考对应的详细规范内容。遇到异常逻辑时，统一使用 `BizException`。任何 PHP 改动在完成后，必须执行 `php -l <文件路径>` 检查语法。

