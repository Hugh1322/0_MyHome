

//��nodejs�У����Ͷ�������庯��һ������ʵ�ú�������NodeCommonJs ��Ĺ��캯��
var NodeCommonJs =function()
{//{{{
    //�����Ҫ������������ֶΡ������ȣ������this�ؼ��֣��������Ϊ�Ǹú����е���ʱ����
    this.ClassName="NodeCommonJs";
    this.author ="yeliangchen";
    
    //00 ������󷽷�
    this.run =function()
    {//{{{
        //01. ����http
        //this.testHttp();

        //02. �������ݿ�
        this.testMysql();

    };//}}}

    //01 ����http
    /**
     *  ��Դ�ο�: http://www.runoob.com/nodejs/nodejs-http-server.html
     *  ���в��裺node http.js ,����������� http://127.0.0.1:8888/ �Ϳ��Կ��� Hello World
     */
    this.testHttp=function()
    {//{{{
        //test
        console.log('http is runing');
        return false;

        var http = require('http');

        http.createServer(function (request, response) {

                // ���� HTTP ͷ�� 
                // HTTP ״ֵ̬: 200 : OK
                // ��������: text/plain
                response.writeHead(200, {'Content-Type': 'text/plain'});

                // ������Ӧ���� "Hello World"
                response.end('Hello World\n');
                }).listen(8888);

        // �ն˴�ӡ������Ϣ
        console.log('Server running at http://127.0.0.1:8888/');
    };//}}}

    //02 ��ѯ���ݿ�
    /**
     *  ��Դ�ο�: http://www.gbin1.com/technology/javautilities/20120904-node-js-for-beginners/
     *  ������ npm install mysql(��Ҫָ���汾�����ѯ������ http://www.bcty365.com/content-74-5887-1.html ) ,��֤node_moduleĿ¼����mysql�����
     */
    this.testMysql=function()
    {//{{{
        var mysql  = require('mysql');

        var connection = mysql.createConnection({
            host     : 'your_host',
            user     : 'your_user',
            password : 'your_passwd',
            port: '3306',
            database: 'your_database',
        });

        connection.connect();

        var  sql = 'SELECT * FROM your_table limit 1';
        //��
        connection.query(sql,function (err, result) {
            if(err){
                console.log('[SELECT ERROR] - ',err.message);
                return;
            }

            console.log('--------------------------SELECT----------------------------');
            console.log(result);
            console.log('------------------------------------------------------------\n\n');
        });

        connection.end();
    };//}}}
};//}}}

var testCommon = new NodeCommonJs();
testCommon.run();
