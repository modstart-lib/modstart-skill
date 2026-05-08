# Blade 模板及视图开发规范

- **样式说明**：使用内置的 SUI 类（`ub-` 前缀）和 Tailwind-Like 类（`tw-` 前缀）。
  - **禁止同时混合使用 SUI 和 Tailwind-Like 类**（SUI优先级可能覆盖）。
  - 若需修改 SUI 默认样式，使用内联样式（`inline style`），而不叠加 Tailwind-Like。
- **组件规范**：
  - 面包屑**必须使用 `ub-breadcrumb`** 统一样式，禁止自定义HTML实现。
- **静态资源**：
  - 使用 `@asset('path/to/file')` 引入 public 下文件。路径无需加上 public，如 `<script src="@asset('static-assets/index.js')">`。
- **代码规范**：
  - 严禁在 Blade 内大段编写 `@php ... @endphp` 来包含业务逻辑。
