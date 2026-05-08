# 模块开发规范

ModStart 模块核心理念：示例驱动开发、约定优于配置、简单优先。

## 项目结构
- `/Admin`：后台管理控制器和路由
- `/Web`：前端控制器和路由
- `/Api`：API 控制器和路由（`Api/routes.php` 自动加载，`Api/Controller/` 存放控制器，命名空间 `\Module\{Name}\Api\Controller`）
- `/OpenApi`：OpenApi 控制器和路由（`OpenApi/routes.php` 自动加载，同理）
- `/Core`：模块服务提供者（仅在需要注册菜单、事件等时创建，**路由无需在此注册**）
- `/Model`：数据库模型（只包含表属性）
- `/Migrate`：数据库迁移
- `/View`：Blade 模板
- `/Util`：模块工具类

## 路由注册规范
- **`module/*/Api/routes.php`**：框架自动加载，前缀 `api`，中间件 `api.bootstrap + api.session`，控制器命名空间 `\Module\{Name}\Api\Controller`，路由内可通过短名称引用控制器（如 `ApiController@fetch`）。
  - 若接口需要**无状态**（外部服务器调用、无需 Session），在路由组内叠加 `StatelessRouteMiddleware`。
  - 若接口需要**会员认证**，在路由组内叠加 `ApiAuthMiddleware`。
- **`module/*/OpenApi/routes.php`**：框架自动加载，前缀 `open_api`，中间件 `openApi.bootstrap`。
- **`app/Module/routes.php`** / **`app/Api/routes.php`**：系统级路由，**不要**将模块路由放到这里。
- **`Core/ModuleServiceProvider.php`**：仅用于注册 AdminMenu、MemberMenu、事件监听等，**不要**在此注册路由。

## 模块注册安装
1. 创建模块结构和 `config.json`
2. 创建迁移文件
3. 创建模型
4. 创建控制器并在 `Api/routes.php`（或 `OpenApi/routes.php`）注册路由
5. 如需后台菜单/事件监听，创建 `Core/ModuleServiceProvider.php`
6. `php artisan modstart:module-install YourModule`
