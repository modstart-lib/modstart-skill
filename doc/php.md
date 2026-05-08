# PHP开发规范

## 基本语法标准
- 当前环境：PHP 5.6，禁止使用 PHP 7+ 语法特性。
- **禁止使用**：`??`、类型提示（如 `function foo(): string`）、标量提示、箭头函数（`fn()`）、空安全运算符（`?->`）。
- 使用 `isset()`、`switch/if-elseif` 等传统方式进行处理。

## 控制器 (Controller) 开发
- **方法命名**：小写字母开头的驼峰命名法（如 `index()`，`gridList()`）。
- **API 封装复用**：Web 控制器方法逻辑**必须**封装到对应的 API 控制器中，Web 方法仅调用并渲染视图以保证接口复用。
- CRUD 开发通常使用 Grid/Form 控制器。
- 模块配置使用 AdminConfigBuilder 或 FormConfigController。

## 接口文档注解
- 使用注解可在模块打包时生成接口文档。
- 控制器类上加 `@Api 模块名`，方法上加 `@Api 接口名`。
- 请求参数使用 `@ApiBodyParam 参数名 类型 说明`。
- 响应数据使用 `@ApiResponseData { ... }` 包裹 JSON 示例（字段名必须加双引号）。
- 示例：
```php
/**
 * @Api 新闻
 */
class NewsController extends Controller
{
  /**
   * @Api 新闻分页
   * @ApiBodyParam search.categoryId int 新闻分类ID
   * @ApiResponseData {
   *   "total": 1,
   *   "page": 1,
   *   "pageSize": 10,
   *   "records": [
   *     {
   *       "id": 1,
   *       "title": "标题"
   *     }
   *   ]
   * }
   */
  public function paginate() {}
}
```

## 工具类 (Util)
- 数据库操作**必须**使用 `ModelUtil`。
- 传入表格参数时，禁止传字符串表名，必须传入类引用，如 `ModelUtil::get(MemberUser::class, ['id'=>1])`。
- 多利用系统内置的 CacheUtil，TreeUtil，等，优先复用 `ModStart\Core\Util\*` 中类库。
- **缓存**：统一使用 `Module\Vendor\Util\CacheUtil`（`remember($key, $seconds, $callback)`、`forget($key)` 等），**禁止**直接使用 Laravel 原生 `Illuminate\Support\Facades\Cache`。
- 异常处统一使用 `BizException::throws()`，严禁使用原生的 `try-catch` 做业务级错误拦截。
- **字符串截取**：插入数据库前若需限制字符串长度，**必须**使用 `StrUtil::mbLimit($value, $limit)` 进行截取，禁止直接使用 `mb_substr()`。
