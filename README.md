<h1 align="center"> settlement </h1>

<p align="center"> 题目2：数据埋点.</p>


## Installing

```shell
$ composer require zcold/settlement -vvv
```

## Usage

> 1、助手函数
```
settlementAddData($tagId, $data, $num, $time)
```

> 2、对象
```

$s = new Zcold\Settlement\Settlement();
/**
 * @param int $tagId 场景id
 * @param null $data 数据
 * @param int $num 次数
 * @param null $date_time 时间
 * @return bool
 */
$s->addData(1, [{user_id:1}, 1, '2021-03-04 10:15:00']);
```


## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/zcold/settlement/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/zcold/settlement/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT