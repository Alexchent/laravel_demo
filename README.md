# demo 博客

## 初始化流程

安装依赖包
```
composer install
```

创建 .env配置文件，注意修改数据库配置 
```
cp .env.example .env
``` 

生成key 
```
php artisan key:generate
```

执行数据库迁移,并填充默认数据
```
php artisan migrate:refresh --seed
```
 

