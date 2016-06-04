
// 以下是实现跨域的服务器端示例代码：
// ------------------------------------------------

// nodejs API 参考：http://nodeapi.ucdok.com/#/api/

// 需要本地安装 formidable ，参见 https://github.com/felixge/node-formidable
var formidable = require('formidable');
var http = require('http');
var fs = require('fs');
var url = require('url');
var path = require('path');

// 文件将要上传到哪个文件夹下面
var uploadfoldername = 'uploadfiles';
var uploadfolderpath = path.join(__dirname, uploadfoldername);

// var server = '192.168.1.2';
var server = 'localhost';
var port = 8012;

http.createServer(function (req, res) {

    var reqMethod = req.method.toLowerCase();

    // ----------------------用 '/upload' 这个路由来处理文件上传----------------------
    if (req.url === '/upload' && (reqMethod === 'post' || reqMethod === 'options')) {
        // 设置允许跨域的域名称
        res.setHeader("Access-Control-Allow-Origin", "http://localhost:8011");
        res.setHeader("Access-Control-Allow-Headers", "X-Requested-With");
        res.setHeader("Access-Control-Allow-Methods", "PUT,POST,GET,DELETE,OPTIONS");

        // ----- 情况1：跨域时，先发送一个options请求，此处要返回200 -----
        if (reqMethod === 'options') {
            console.log('options 请求时，返回 200');

            // 返回结果
            res.writeHead(200, {
                'Content-type': 'text/html'
            });
            res.end('options OK');
            return;
        }

        // ----- 情况2：发送post请求，上传图片 -----

        console.log('定位到 /upload 路由');

        // 使用第三方的 formidable 插件初始化一个 form 对象
        var form = new formidable.IncomingForm();

        // 处理 request
        form.parse(req, function (err, fields, files) {
            if (err) {
                return console.log('formidable, form.parse err');
            }

            console.log('formidable, form.parse ok');

            var item;

            // 计算 files 长度
            var length = 0;
            for (item in files) {
                length++;
            }
            if (length === 0) {
                console.log('files no data');
                return;
            }

            for (item in files) {
                var file = files[item];
                // formidable 会将上传的文件存储为一个临时文件，现在获取这个文件的目录
                var tempfilepath = file.path;
                // 获取文件类型
                var type = file.type;

                // 获取文件名，并根据文件名获取扩展名
                var filename = file.name;
                var extname = filename.lastIndexOf('.') >= 0
                                ? filename.slice(filename.lastIndexOf('.') - filename.length)
                                : '';
                // 文件名没有扩展名时候，则从文件类型中取扩展名
                if (extname === '' && type.indexOf('/') >= 0) {
                    extname = '.' + type.split('/')[1];
                }
                // 将文件名重新赋值为一个随机数（避免文件重名）
                filename = Math.random().toString().slice(2) + extname;

                // 构建将要存储的文件的路径
                var filenewpath = path.join(uploadfolderpath, filename);

                // 将临时文件保存为正式的文件
                fs.rename(tempfilepath, filenewpath, function (err) {
                    // 存储结果
                    var result = '';

                    if (err) {
                        // 发生错误
                        console.log('fs.rename err');
                        result = 'error|save error';
                    } else {
                        // 保存成功
                        console.log('fs.rename done');
                        // 拼接图片url地址
                        result = 'http://' + server + ':' + port + '/' + uploadfoldername + '/' + filename;
                    }
                    
                    // 返回结果
                    res.writeHead(200, {
                        'Content-type': 'text/html'
                    });
                    res.end(result);
                }); // fs.rename
            } // for in 
        });
    } else {
        // ---------------------- 其他路由，直接作为静态文件返回，如通过url获取图片 ----------------------
        var pathname = url.parse(req.url).pathname;
        var filepath = path.join(__dirname, pathname);
        fs.readFile(filepath, function (err, file) {
            if (err) {
                res.writeHead(404);
                console.log('response file error: ' + filepath);
                res.end('404 NOT FOUND...');
                return;
            }
            if (filepath.slice(filepath.lastIndexOf('.') - filepath.length) === '.css') {
                // 兼容IE
                res.writeHead('200', {'Content-type': 'text/css'});
            } else {
                res.writeHead('200');
            }
            console.log('response file success: ' + filepath);
            res.end(file);
        });
    }

}).listen(port);

// 监听 localhost port 端口
console.log('server start at http://' + server + ':' + port);
