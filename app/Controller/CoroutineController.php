<?php


namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\Guzzle\ClientFactory;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Coroutine;
use Hyperf\Utils\Parallel;
use Hyperf\Utils\WaitGroup;
use Swoole\Coroutine\Channel;



/**
 * Class CoroutineController
 * @package App\Controller
 * @AutoController()
 */
class CoroutineController  extends AbstractController
{
    /**
     * @var ClientFactory
     * @Inject()
     */
    private $clientFactory;

    public function sleep(RequestInterface $request)
    {
        $second = $request->query('second',1);
        sleep($second);
        return $second;
    }

    /**
     * @return string
     *  int(1)
        int(2)
        int(4)
        int(5)
        int(7)
        int(6)
        int(8)
        int(3)
        int(9)
     *
     */
    public function index()
    {
        $channel = new Channel();
        var_dump(1);
        //hyperf创建协程方式1：
        Coroutine::create(function()  use ($channel){
            $client = $this->clientFactory->create();
            var_dump(2);
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            var_dump(3);
            $channel->push(123);
        });
        var_dump(4);
        Coroutine::create(function() use ($channel){
            $client = $this->clientFactory->create();
            var_dump(5);
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            var_dump(6);
            $channel->push(321);
        });
        var_dump(7);
        $res1 = $channel->pop();
        var_dump(8);
        $res2 = $channel->pop();
        var_dump(9);
        return $res1 . ':' . $res2;
    }

    public function index2()
    {
        $wg = new WaitGroup();
        $wg->add(2);
        //创建协程方式2
        co(function() use ($wg){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            $wg->done();
        });


        co(function() use ($wg){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            $wg->done();
        });

        $wg->wait();
        return "finish";
    }

    public function index3()
    {
        //创建协程方式3
        $wg = new WaitGroup();
        $wg->add(2);
        $res = [];
        //创建协程方式2
        go(function() use ($wg,&$res){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            $res[] = 123;
            $wg->done();
        });


        go(function() use ($wg,&$res){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            $res[] = 321;
            $wg->done();
        });

        $wg->wait();
        return $res;
    }

    public function index4()
    {
        $parallel = new Parallel();
        $parallel->add(function(){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            return Coroutine::id();
        });
        $parallel->add(function(){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            return Coroutine::id();
        });
        $wait = $parallel->wait();
        return $wait;
    }

    public function index5()
    {
        $parallel = parallel([function () {
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            return Coroutine::id();
        },function(){
            $client = $this->clientFactory->create();
            $client->get("http://192.168.1.15:9501/coroutine/sleep?second=2");
            return Coroutine::id();
        }]);

        return $parallel;
    }
}